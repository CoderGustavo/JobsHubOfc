<div class="cad-vaga" id="cadastro">
    <div class="title-page">
            <h1>Curriculo</h1>
            <h2>Preencha os campos abaixo: </h2>
    </div>

        <div class="inputs container">
            
            <div class="input-group">
                <label for="">Nome</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            
            <div class="input-group">
                <label for="">Pequena Descrição</label>
                <input type="text" name="short_desc">
            </div>

            <div class="input-group">
                <label for="">Descrição Completa</label>
                <textarea rows="6" name="full_desc"></textarea>
            </div>

            <button type="submit" id="cad-vaga-btn-button" class="btn btn-rounded btn-d-style1">Próximo
            </button>

        </div>
</div>

