<?php
/*
Template Name: Página Interna
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $pathRoot = get_template_directory() . "/";
        $path = get_template_directory() . "/paginas-internas/";
        $idBotoes = get_page_by_path( 'botoes', OBJECT, 'page');

?>

    <div id="conteudo-principal" class="interna topo"></div>
    <div class="interna info">
        <div class="interna-wrapper">
            <div class="container-titulo">
                <?php
                    include_once $path . 'titulo.php'
                ?>
            </div>
            <div class="container-interna">
                <div class="container-conteudo">
                    <?php
                        include_once $path . 'conteudo.php'
                    ?>
                </div>
                <div class="container-sidebar">
                    <?php
                        include_once $path . 'legislacao.php';
                        include_once $path . 'duvidas.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="interna ajuda">
        <?php
            include_once $path . 'ajuda.php'
        ?>
    </div>
<?php
    endwhile;
endif;

get_footer();
?>