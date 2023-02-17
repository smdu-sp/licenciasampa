<?php
/*
Template Name: Avisos
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $path = get_template_directory() . "/avisos/";
        $pathRoot = get_template_directory() . "/";
        $pathInternas = get_template_directory() . "/paginas-internas/";
        $idBotoes = get_page_by_path( 'botoes', OBJECT, 'page');
?>
    <div id="conteudo-principal" class="interna topo"></div>
    <div class="interna info">
        <div class="interna-wrapper">
            <div class="container-titulo">
                <?php
                    include_once $pathInternas . 'titulo.php'
                ?>
            </div>
            <div class="container-avisos">
                <?php 
                    include_once $path . 'avisos.php'
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