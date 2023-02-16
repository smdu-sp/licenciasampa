<?php 
    $atualizado = get_field( "ultima_atualizacao" );

    if (!$atualizado) {
        $atualizado = get_the_modified_date('d/m/Y H:i:s');
    }

    include_once $pathRoot . 'modulo-breadcrumb.php';
?>

<div class="titulo-decorado">
    <h1><?= the_title() ?></h1>
</div>
<?php if ($atualizado) { ?>
    <div class="atualizado-em">Atualizado em: <?= $atualizado ?></div>
<?php } ?>