$(()=>{

    $('#min-salary , #max-salary, #start-salary ').mask('000000000000000.00', {reverse: true});
    
    $('#min-cad, #max-cad').mask('000.000', {reverse: true});

    // $('#open-date , #close-date').mask('00/00/0000');

    $("button[type='submit']#cad-vaga-btn-button").on("click", (e)=>{
        e.preventDefault();

        $("#cadastro").css("transform", "translateX(100%)")
        $("#salary").css("transform", "translateX(0)")

    });

    $("button[type='submit']#cad-vaga-btn-button2").on("click", (e)=>{
        e.preventDefault();

        $("#salary").css("transform", "translateX(-100%)")
        $("#vecancy-type").css("transform", "translateX(0)")

    });

    $("button[type='submit']#cad-vaga-btn-button3").on("click", (e)=>{
        e.preventDefault();

        $("#vecancy-type").css("transform", "translateX(-100%)")
        $("#date").css("transform", "translateX(0)")

    });
    
    $("button[type='submit']#cad-vaga-btn-button4").on("click", (e)=>{

       let open_data = $("input[name='open_date']").val();
           open_data = open_data.split('/');     
           open_data = open_data[2]+"-"+open_data[1]+"-"+open_data[0];

        let close_data = $("input[name='close_date']").val();
            close_data = close_data.split('/');
            close_data = close_data['2']+"-"+close_data['1']+"-"+close_data['0'];

        e.preventDefault();
        let data = {
            name: $("input[name ='name']").val(),
            short_desc: $("input[name='short_desc']").val(),
            full_desc: $("textarea[name='full_desc']").val(),
            salary_min: $("input[name='salary_min']").val(),
            salary_max: $("input[name='salary_max']").val(),
            salary_defined: $("input[name='salary_defined']").val(),
            vacancy_type: $("input[name='vacancy_type']").val(),
            required_abilities: $("input[name='required_abilities']").val(),
            difference_abilities: $("input[name='difference_abilities']").val(),
            workload: $("input[name='workload']").val(),
            activity: $("input[name='activity']").val(),
            qtd_max_cand: $("input[name='qtd_max_cand']").val(),
            qtd_min_cand: $("input[name='qtd_min_cand']").val(),
            open_date: open_data,
            close_date: close_data,

        }
        let update_vacancy = $.post("/editarVaga", data,'json')
        update_vacancy.done(function(response){
            response = JSON.parse(response);
            if(response.error){
                // $(".error_message").html(response.error);
            }else{
                $("#date").css("transform", "translateX(-100%)");
                $("#vecancy-finish").css("transform", "translateX(0)");
            }
        });

    });
})



