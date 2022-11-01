$(()=>{
    $(".removerVaga").on("click", (e)=>{
        e.preventDefault();
        let data = {
            id_vacancy: $(e)[0].currentTarget.getAttribute("id")
        }

        let removeVacancy = $.post("/removerVaga", data, "json");
        removeVacancy.done(function(response){
            if(!response.error){
                $($(e)[0].currentTarget).parent().parent().parent().remove();
            }
        });
    });
});