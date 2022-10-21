let positionstart = 0;
let positionend = 0;

$(document).on('touchstart', function(e){
    positionstart = e.touches[0].pageX;
});

$(document).on('touchend', function(e){
    positionend = e.changedTouches[0].pageX;
    if (positionstart>positionend){
        $(".card-like").css({"left": "50%", "transform":"translate(-50%, -50%)"});
        setTimeout(() => {
            $(".card-like").addClass('card-like-active')
        }, 300);
        setTimeout(() => {
            $(".card-like").css({"background-color": "#008a1e"})
        }, 300);
        setTimeout(() => {
            $(".card-like").css({"width":"100vw", "height":"110vh"})
        }, 300);
        setTimeout(() => {
            $(".card-like").removeClass('card-like-active')
        }, 1500);
        setTimeout(() => {
            $(".card-like").css({"with": "", "height": "", "left": "", "transform": ""})
        }, 2000);
    }
    else{
        if(positionend>positionstart){
            $(".card-unlike").css({"left": "50%", "transform": "translate(-50%, -50%)", "z-index": "9999999999999"})
            setTimeout(() => {
                $(".card-unlike").addClass('card-unlike-active')
            }, 300);
            setTimeout(() => {
                $(".card-unlike").css({"background-color": "#c42e2e"})
            }, 300);
            setTimeout(() => {
                $(".card-unlike").css({"width": "100vw", "height": "110vh"})
            }, 300);
            setTimeout(() => {
                $(".card-unlike").removeClass('card-unlike-active')
            }, 1500);
            setTimeout(() => {
                $(".card-unlike").css({"width": "", "height": "", "left": "", "transform": ""})
            }, 2000);
        }
    }
});