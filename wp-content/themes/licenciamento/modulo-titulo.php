<?php
    
    ob_start();
    if (!is_front_page()) { ?>
        <div class="container-titulo">
            <div class="container-breadcrumb">Você está aqui: <div class="breadcrumb"><?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div></div>
            <div class="titulo-decorado">
                <h1><?php the_title() ?></h1>
            </div>
            <div class="atualizado-em">Atualizado em: <?php the_modified_date()?></div>
        </div>
    <?php
    }
?>