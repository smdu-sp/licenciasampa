<?php
    $avisosRaw = get_field('avisos');
    $avisos = Array();
    
    foreach ($avisosRaw as $key => $value) {
        if(is_int($key)) {
            $avisos[$key] = $value;
        }
    }
?>

<div class="conteudo-avisos">
    <?php foreach ($avisos as $key => $value) { ?>
        <div class="aviso-titulo">
            <h2><?= $avisos[$key]['titulo'] ?></h2>
        </div>
        <div class="aviso-texto">
            <?= $avisos[$key]['texto'] ?>
        </div>
        <div class="aviso-link">
            <a href="<?= $avisos[$key]['url'] ?>"><?= $avisos[$key]['texto_url'] ?></a>
        </div>
    <?php } ?>
</div>