<?php 
    $atualizado = get_field( "ultima_atualizacao" );

    include_once $pathRoot . 'modulo-breadcrumb.php';
?>

<div class="titulo-decorado">
    <h1><?= the_title() ?></h1>
</div>
<?php if ($atualizado) { ?>
    <div class="atualizado-em">Atualizado em: <?= $atualizado ?></div>
<?php } ?>