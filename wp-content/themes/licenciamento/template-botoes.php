<?php
/*
Template Name: Botões
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $botoes_sistemas = get_field( "botoes_sistemas" );
        $botoes_legislacao = get_field( "botoes_legislacao" );
        $secoes = get_field_objects();

        // Encontra apenas os elementos relacionados a botão e remove o resto
        foreach ($secoes as $key => $value) {
            print_r($key);
            if (substr_compare($key, "botoes", 0, 6) !== 0) {
                unset($secoes[$key]);
            }
        }
?>

    <div id="conteudo-principal" class="interna topo"></div>
    <div class="interna info">
        <div class="interna-wrapper">
            <div class="container-titulo">
                <div>
                    <h1><?= the_title() ?></h1>
                </div>
            </div>
            <?php foreach ($secoes as $key => $value) {
                $secao = $secoes[$key]["name"];
                $secaoArr = $secoes[$key];

                print_r($secao);
                ?>
            <div class="assuntos-accordion">
                <div class="assunto-titulo">
                    <h3><?= $secaoArr["label"] ?></h3>
                </div>
                <div class="assunto-sistemas">
                    <?php foreach ($secaoArr["value"] as $key => $arr) {
                        $botao = $secaoArr["value"][$key];
                        ?>
                        <div class="assunto-conteudo">
                            <div class="<?= $secao === "botoes_sistemas" ? "assunto-botao" : ($secao === "botoes_legislacao" ? "legislacao-botao" : "") ?>">
                                <a href="<?= $botao["url"] ?>">
                                    <div class="botao">
                                        <span><?= $botao["texto"] ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <pre>
                <!-- debug -->
                <?php print_r($secoes) ?>
            </pre>
        </div>
    </div>


<?php
    endwhile;
endif;

get_footer();
?>