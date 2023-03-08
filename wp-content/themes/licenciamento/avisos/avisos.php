<?php
    $avisosRaw = get_field('avisos');
    $avisos = Array();
    
    foreach ($avisosRaw as $key => $value) {
        if(is_int($key) && $avisosRaw[$key]['titulo']) {
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
        <?php if($key !== count($avisos) - 1) { ?>
            <div class="aviso-separador"></div>
        <?php }
    } ?>
</div>