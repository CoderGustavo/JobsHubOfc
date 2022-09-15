$(()=>{
    $(".btn-comecar").on("click",(e)=>{
        $(".getStarted").css("transform", "translateX(-100%)");
        return false;
    });
});