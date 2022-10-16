$(()=>{

    $('#min-salary , #max-salary, #start-salary').mask('000.000.000.000.000,00', {reverse: true});

    $('#open-date , #close-date').mask('00/00/0000');

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
        e.preventDefault();

        $("#date").css("transform", "translateX(-100%)")
        $("#vecancy-finish").css("transform", "translateX(0)")

    });
})

