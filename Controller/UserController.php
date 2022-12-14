<?php

class UserController{
    protected $user, $table;

    public function __construct(){
        include_once ROOT."/Model/user.php";
        $this->user = new Users();
        $this->conn = $this->user->getConnection();
        $this->table = $this->user->getTable();
        $this->pk = $this->user->getPk();
    }

    public function login($email, $password, $re = false){
        $password = md5(sha1(md5(sha1($password))));

        $query = $this->conn->prepare("SELECT * FROM $this->table where email = :email AND password = :pass");
        $query->bindParam(":email", $email);
        $query->bindParam(":pass", $password);
        $query->execute();
        $user = $query->fetch();

        if(Empty($user)){
            $res = array("error" => "Credenciais incorretas");
            if($re){
                return json_encode($res);
            }else{
                echo json_encode($res);
            }
        }else{
            $query1 = $this->conn->prepare("SELECT about FROM users JOIN resumes ON resumes.id_resume = users.id_resume WHERE users.$this->pk = :id");
            $query1->bindParam(":id", $user['id_user']);
            $query1->execute();
            $user["about"] = "Sobre mim";

            $query2 = $this->conn->prepare("SELECT COUNT(*) AS total_work_experiences FROM users
                JOIN resumes ON resumes.id_resume = users.id_resume
                RIGHT JOIN resumes_work_experiences ON resumes_work_experiences.id_resume = resumes.id_resume
                JOIN work_experiences ON work_experiences.id_work_experiences = resumes_work_experiences.id_work_experiences
                WHERE users.$this->pk = :id");
            $query2->bindParam(":id", $user['id_user']);
            $query2->execute();
            $user["total_work_experiences"] = 0;


            $query3 = $this->conn->prepare("SELECT COUNT(*) AS total_abilities FROM users
                JOIN resumes ON resumes.id_resume = users.id_resume
                RIGHT JOIN resumes_abilities ON resumes_abilities.id_resume = resumes.id_resume
                JOIN abilities ON abilities.id_ability = resumes_abilities.id_ability
                WHERE users.$this->pk = :id");
            $query3->bindParam(":id", $user['id_user']);
            $query3->execute();
            $user["total_abilities"] = 0;

            $_SESSION["user"] = $user;
            $res = array("success" => "Usu??rio logado");

            if($re){
                return json_encode($res);
            }else{
                echo json_encode($res);
            }
        }

    }

    public function register($email, $password, $confirm_password){
        if($password != $confirm_password){
            $res = array("error" => "As senhas n??o coincidem!");
            echo json_encode($res);
            return;
        }

        $password = md5(sha1(md5(sha1($password))));

        $query = $this->conn->prepare("INSERT INTO $this->table (email, password) VALUES (:email, :pass)");
        $query->bindParam(":email", $email);
        $query->bindParam(":pass", $password);


        $query->execute();
        if($query->errorInfo()["2"]){
            $res = array("error" => $query->errorInfo()["2"]);
            echo json_encode($res);
            return;
        }

        $res = array("success" => "Conta criada com sucesso!");
        echo json_encode($res);
    }

    public function editPass($userlogged, $current_password, $new_password, $new_password_confirmation){
        $userlogged = json_decode($userlogged);
        $pass = md5(sha1(md5(sha1($current_password))));

        if($userlogged->password != $pass){
            $res = array("error" => "Senha digitada n??o coincide com sua senha atual!");
            return json_encode($res);
        }else if($new_password != $new_password_confirmation){
            $res = array("error" => "As novas senhas n??o se coincidem!");
            return json_encode($res);
        }

        $new_password = md5(sha1(md5(sha1($new_password))));

        $query = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
        $query->bindParam(":id", $userlogged->id);
        $query->bindParam(":password", $new_password);
        $id = $query->execute();
        if($id){
            $res = array("success" => "Altera????es realizadas com sucesso!");
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
            $res = array("success" => "Altera????es realizadas com sucesso!");
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }

    }

    public function logout(){
        unset($_SESSION["user"]);
        header("location: /");
    }

}
