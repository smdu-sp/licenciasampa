<?php
/*
Template Name: Página Interna
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
                    include_once PATH_INTERNAS . 'titulo.php';
                ?>
            </div>
            <div class="container-interna">
                <div class="container-conteudo">
                    <?php
                        include_once PATH_INTERNAS . 'conteudo.php'
                    ?>
                </div>
                <div class="container-sidebar">
                    <?php
                        include_once PATH_INTERNAS . 'legislacao.php';
                        include_once PATH_INTERNAS . 'duvidas.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="interna ajuda">
        <?php
            include_once PATH_INTERNAS . 'ajuda.php'
        ?>
    </div>
<?php
    endwhile;
endif;

get_footer();
?>