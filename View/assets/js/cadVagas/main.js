$(()=>{

    $('#min-salary , #max-salary, #start-salary ').mask('000000000000000.00', {reverse: true});

    $('#min-cad, #max-cad').mask('000.000', {reverse: true});

    $('#open-date , #close-date').mask('00/00/0000');

    let val1, val2, val3, deuruim = false;

    $("button[type='submit']#cad-vaga-btn-button").on("click", (e)=>{
        val1 = {
            name: $("[name ='name']").val(),
            short_desc: $("[name='short_desc']").val(),
            full_desc: $("textarea[name='full_desc']").val(),
        }
        if(val1.name && val1.full_desc && val1.short_desc)
        {
            $("#cadastro").css("transform", "translateX(100%)")
            $("#salary").css("transform", "translateX(0)")
        }
        else{
            document.getElementById("campo_vazio").innerHTML = "Preencha todos os campos obrigatórios*";
        }
    });

    $("button[type='submit']#cad-vaga-btn-button2").on("click", (e)=>{
        e.preventDefault();
        val2= {
            qtd_max_cand: $("[name='qtd_max_cand']").val(),
            qtd_min_cand: $("[name='qtd_min_cand']").val(),
            salary_min: $("[name='salary_min']").val(),
            salary_max: $("[name='salary_max']").val(),
            salary_defined: this.salary_min || this.salary_max ? 1 : 0,
        }
        if(val2.qtd_max_cand && val2.qtd_min_cand)
        {
            $("#salary").css("transform", "translateX(-100%)")
            $("#vecancy-type").css("transform", "translateX(0)")
        }else{
            document.getElementById("campo_vazio1").innerHTML = "Preencha todos os campos obrigatórios*"
        }

    });
    $("button[type='submit']#cad-vaga-btn-button3").on("click", (e)=>{
        e.preventDefault();
        val3 = {
            vacancy_type: $("[name='vacancy_type']").val(),
            hours_day: $("[name='workload']").val(),
            activity: $("[name='activity']").val(),
        }
        if(val3.vacancy_type && val3.hours_day && val3.activity){
            $("#vecancy-type").css("transform", "translateX(-100%)")
            $("#date").css("transform", "translateX(0)")
        }else{
            document.getElementById("campo_vazio2").innerHTML = "Preencha todos os campos obrigatórios*"
        }
    });

    $("button[type='submit']#cad-vaga-btn-button4").on("click", (e)=>{

        if(!$("[name='open_date']").val() && !$("[name='close_date']").val()) {document.getElementById("campo_vazio3").innerHTML = "Preencha todos os campos obrigatórios*"; return;}

        let open_data = $("[name='open_date']").val();
        open_data = open_data.split('/');
        open_data = open_data[2]+"-"+open_data[1]+"-"+open_data[0];

        let close_data = $("[name='close_date']").val();
        close_data = close_data.split('/');
        close_data = close_data['2']+"-"+close_data['1']+"-"+close_data['0'];

        let val = {
            close_date: close_data,
            open_date: open_data
        }

        if(val.close_date && val.open_date){

            e.preventDefault();

            let data = {
                ...val1,
                ...val2,
                ...val3,
                ...val
            }

            let data_abilities = {
                required_abilities: $("[name='required_abilities']").val(),
                difference_abilities: $("[name='difference_abilities']").val(),
            }

            let create_vacancy = $.post("/cadastrovaga/1", data,'json')
            create_vacancy.done(function(response){
                response = JSON.parse(response);
                if(response.error){
                    $(".error_message").html(response.error);
                    deuruim = true;
                    return;
                }
                else{
                    data_abilities.difference_abilities.forEach(element => {
                        let create_vacancy_abilities_dif = $.post("/cadastrovaga/2", {id_vacancy: response.id_vaga, id_ability: element},'json')
                        create_vacancy_abilities_dif.done(function(response){
                            response = JSON.parse(response);
                            if(response.error){
                                $(".error_message").html(response.error)
                                deuruim = true;
                                return;
                            }
                        });
                    });

                    data_abilities.required_abilities.forEach(element => {
                        let create_vacancy_abilities_req = $.post("/cadastrovaga/3", {id_vacancy: response.id_vaga, id_ability: element},'json')
                        create_vacancy_abilities_req.done(function(response){
                            response = JSON.parse(response);
                            if(response.error){
                                $(".error_message").html(response.error)
                                deuruim = true;
                                return;
                            }
                        });
                    });
                }
            });

            if (deuruim) return;

            $("#date").css("transform", "translateX(-100%)");
            $("#vecancy-finish").css("transform", "translateX(0)");


        }else{
            document.getElementById("campo_vazio3").innerHTML = "Preencha todos os campos obrigatórios*"
        }
    });
})

