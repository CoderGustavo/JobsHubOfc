<div id="salary" class="cad-vaga">

    <div class="inputs container">

        <div class="input-group">
            <label for="">Quantidade Máxima de Candidatos</label>
            <input type="text" id="max-cad" name="qtd_max_cand" value="<?php echo $vaga['qtd_max_cand'] ?>">
        </div>

        <div class="input-group">
            <label for="">Quantidade Minima de Candidatos</label>
            <input type="text" id="min-cad" name="qtd_min_cand" value="<?php echo $vaga['qtd_min_cand']?>">
        </div>

        <div class="input-group">
            <label for="">Sálario Minimo</label>
            <input type="text"  id="min-salary" name="salary_min" value="<?php echo $vaga['salary_min']?>n">
        </div>

        <div class="input-group">
            <label for="">Sálario Máximo</label>
            <input type="text" id="max-salary" name="salary_max" value="<?php echo $vaga['salary_max']?>">
        </div>
        
        <div class="input-group">
            <label for="">Sálario Definido</label>
            <input type="text" id="start-salary" name="salary_defined" value="<?php echo $vaga['salary_defined'] ?>">
        </div>

    </div>

    <button type="submit" id="cad-vaga-btn-button2" class="btn btn-rounded btn-d-style1">Próximo</button>

</div>