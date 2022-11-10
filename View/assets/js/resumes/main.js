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