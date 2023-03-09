<?php 
    $atualizado = get_field( "ultima_atualizacao" );

    if (!$atualizado) {
        $atualizado = get_the_modified_date('d/m/Y H:i:s');
    }

    include_once PATH_INTERNAS . 'breadcrumb.php';
?>

<div class="titulo-decorado">
    <h1><?= the_title() ?></h1>
</div>
<?php if ($atualizado) { ?>
    <div class="atualizado-em"><?= carregar_svg( 'interna-calendario.svg' )?><span>Atualizado em: <?= $atualizado ?></span></div>
<?php } ?>