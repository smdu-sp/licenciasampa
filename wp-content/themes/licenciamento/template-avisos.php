<?php
/*
Template Name: Avisos
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

?>
    <div id="conteudo-principal" class="interna topo"></div>
    <div class="interna info">
        <div class="interna-wrapper">
            <div class="container-titulo">
                <?php
                    include_once PATH_INTERNAS . 'titulo.php'
                ?>
            </div>
            <div class="container-avisos">
                <?php 
                    include_once PATH_AVISOS . 'avisos.php'
                ?>
            </div>
        </div>
    </div>

    <style>
    .aviso-separador {
        display: block;
        content: "";
        width: 100%;
        height: 1px;
        background-color: #D9D9D9;
    }
    </style>

<?php
    endwhile;
endif;

get_footer();
?>