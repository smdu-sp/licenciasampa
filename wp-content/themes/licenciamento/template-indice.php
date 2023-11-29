<?php
/*
Template Name: Página de Índice
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
                    include_once PATH_INDICE . 'titulo.php';
                ?>
            </div>
            <div class="container-interna">
                <div class="container-conteudo">
                    <?php
                        include_once PATH_INDICE . 'indice-interno.php';
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
        $host = $_SERVER['HTTP_HOST'];
        if ($host !== 'localhost') {
        wp_enqueue_script( 'vue-app', '/js/main.js' );
        wp_enqueue_style( 'vue-app', '/css/main.css' );
        } 
    ?>
<?php
    endwhile;
endif;

get_footer();
?>