$(()=>{
    const input_buscar=$(".input-buscar input");
    const placeholder_input=$(".input-buscar span");

    if(input_buscar.val()){
        placeholder_input.css("bottom", "2rem"); 
        placeholder_input.css("left", ".5rem"); 
    }

    input_buscar.on("focus", ()=>{
        placeholder_input.css("bottom", "2rem"); 
        placeholder_input.css("left", ".5rem"); 
    });

    input_buscar.on("blur", ()=>{
        if(!input_buscar.val()){
            placeholder_input.css("bottom", "");
            placeholder_input.css("left", "");
        }
    });
});