<div id="vecancy-type" class="cad-vaga">
    <div class="title-page">
        <p id="campo_vazio2"></p>
        </div>
    <div class="inputs container">
        <div class="input-group">
            <label for="">Tipo de Vaga</label>
            <select name="vacancy_type" id="">
                <option value="Estagiário">Estagiário</option>
                <option value="Júnior">Júnior</option>
                <option value="Pleno">Pleno</option>
                <option value="Senior">Senior</option>
            </select>
        </div>

        <div class="input-group">
            <div class="dropdown-mul-1">
                <label for="">Habilidades Obrigatórias</label>
                <select style="display:none"  name="required_abilities" id="" multiple placeholder="Select">
                </select>
            </div>
        </div>

        <div class="input-group">
            <div class="dropdown-mul-2">
                <label for="">Habilidades Diferenciais</label>
                <select style="display:none"  name="difference_abilities" id="" multiple placeholder="Select">
                </select>
            </div>
        </div>

        <div class="input-group">
            <label for="">Carga horaria diária</label>
            <input type="number" name="workload">
        </div>

        <div class="input-group">
            <label for="">Atividade a ser exercida</label>
            <input type="text" name="activity">
        </div>
    </div>

    <p class="error_message"></p>

    <button type="submit" id="cad-vaga-btn-button3" class="btn btn-rounded btn-d-style1">Próximo</button>

</div>


<script>
    var jsonHabObg = {
        data: [
            <?php foreach ($habilidades as $key => $habilidade): ?>
            {
                disabled: false,
                groupId: 1,
                groupName: "Habilidades Obrigatórias",
                id: <?php echo $habilidade["id_ability"] ?>,
                name: "<?php echo $habilidade["ability"] ?>",
                selected: false
            },
            <?php endforeach; ?>
        ]
    }

    var jsonHabDif = {
        data: [
            <?php foreach ($habilidades as $key => $habilidade): ?>
            {
                disabled: false,
                groupId: 1,
                groupName: "Habilidades Diferenciais",
                id: <?php echo $habilidade["id_ability"] ?>,
                name: "<?php echo $habilidade["ability"] ?>",
                selected: false
            },
            <?php endforeach; ?>
        ]
    }

    $('.dropdown-mul-1').dropdown({
        data: jsonHabObg.data,
        limitCount: 40,
        multipleMode: 'label'
    });

    $('.dropdown-mul-2').dropdown({
        data: jsonHabDif.data,
        limitCount: 40,
        multipleMode: 'label'
    });

</script>
