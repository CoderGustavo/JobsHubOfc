<?php

class UsersController{
    protected $users, $table;

    public function __construct(){
        include_once ROOT."/Model/users.php";
        $this->user = new Users();
        $this->conn = $this->users->getConnection();
        $this->table = $this->users->getTable();
    }

    public function login($email, $password){
        $password = md5(sha1(md5(sha1($password))));

        $query = $this->conn->prepare("SELECT * FROM $this->table where email = :email AND password = :pass");
        $query->bindParam(":email", $email);
        $query->bindParam(":pass", $password);
        $query->execute();
        $user = $query->fetch();
        if(Empty($user)){
            $res = array("error" => "Credenciais incorretas");
            echo json_encode($res);
        }else{
            $_SESSION["user"] = $user;
            $res = array("success" => "Usuário logado");
            echo json_encode($res);
        }

    }

    public function register($email, $password, $confirm_password){
        if($password != $confirm_password){
            $res = array("error" => "As senhas não coincidem!");
            echo json_encode($res);
        }

        $password = md5(sha1(md5(sha1($password))));

        $query = $this->conn->prepare("INSERT INTO $this->table (email, password) VALUES (:email, :pass)");
        $query->bindParam(":email", $email);
        $query->bindParam(":pass", $password);

        $queryLogin = $this->conn->prepare("SELECT * FROM $this->table where email = :email AND password = :pass");
        $queryLogin->bindParam(":email", $email);
        $queryLogin->bindParam(":pass", $password);
        
        try {
            $query->execute();
        } catch (Throwable $th) {
            $res = array("error" => $th->errorInfo[2]);
            echo json_encode($res);
            return;
        }

        $queryLogin->execute();
        $_SESSION["user"] = $queryLogin->fetch();

        $res = array("success" => "Usuário criado com sucesso!");
        echo json_encode($res);
    }

    public function editAccount($userlogged ,$username, $email, $phone, $password){
        $userlogged = json_decode($userlogged);
        $pass = md5(sha1(md5(sha1($password))));

        if($userlogged->password != $pass){
            $res = array("error" => "Senha digitada não coincide com sua senha atual!");
            return json_encode($res);
        }

        $query = $this->conn->prepare("UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id");
        $query->bindParam(":id", $userlogged->id);
        $query->bindParam(":name", $username);
        $query->bindParam(":email", $email);
        $query->bindParam(":phone", $phone);
        $id = $query->execute();
        if($id){
            $res = array("success" => "Alterações realizadas com sucesso!");
            return json_encode($res);
        }
    }

    public function editPass($userlogged, $current_password, $new_password, $new_password_confirmation){
        $userlogged = json_decode($userlogged);
        $pass = md5(sha1(md5(sha1($current_password))));

        if($userlogged->password != $pass){
            $res = array("error" => "Senha digitada não coincide com sua senha atual!");
            return json_encode($res);
        }else if($new_password != $new_password_confirmation){
            $res = array("error" => "As novas senhas não se coincidem!");
            return json_encode($res);
        }

        $new_password = md5(sha1(md5(sha1($new_password))));

        $query = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
        $query->bindParam(":id", $userlogged->id);
        $query->bindParam(":password", $new_password);
        $id = $query->execute();
        if($id){
            $res = array("success" => "Alterações realizadas com sucesso!");
            return json_encode($res);
        }
    }


    public function updateInfos($userlogged, $infos){
        $a = "";
        $index = 1;

        foreach ($infos as $key => $info) {
            count($infos) != $index ? $a .= "$key = :$key, " : $a .= "$key = :$key";
            $index++;
        }

        $query = $this->conn->prepare("UPDATE users SET ". $a ." WHERE id_user = :id");
        $query->bindParam(":id", $userlogged["id_user"]);
        $index = 1;
        foreach ($infos as $key => $info) {
            $query->bindParam(":$key", $infos[$key]);
            $index++;
        }
        try {
            $query->execute();
            $res = array("success" => "Alterações realizadas com sucesso!");
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }
        
    }

}
