<?php
/*
Template Name: Página Interna
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $pathRoot = get_template_directory() . "/";
        $path = get_template_directory() . "/paginas-internas/";

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
                    ?>
                </div>
            </div>
        </div>
    </div>

    <style>
    .interna.info {
        background-color: #fff;
    }

    /* CONTEÚDO */
    .container-conteudo {
        max-width: 880px;
    }

    .conteudo-interna .atualizado-em {
        margin-top: 16px;
    }

    .conteudo-interna .subtitulo {
        font-size: 3.6rem;
        font-weight: 900;
        color: var(--black01);
        margin-top: 30px;
    }

    .interna .assuntos-accordion {
        padding: 36px;        
        border-radius: 5px;
        background-color: #fff;
    }

    .interna .assunto-titulo {
        font-size: 2.4rem;
        font-weight: 700;
        color: var(--black01);
    }

    .interna .assunto-sistemas {
    }

    .interna .assunto-conteudo {
        display: flex;
        justify-content: space-between;
    }
    
    .interna .assunto-texto {
        max-width: 440px;
    }

    .interna .assunto-botao  {
        margin-top: 30px;
        color: #fff;
        background-color: var(--blue01);
        display: inline-block;
        min-width: 270px;
        width: 270px;
        height: 120px;
        border-radius: 5px;
    }

    .interna .assunto-botao a {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        font-weight: 700;        
    }

    .interna .assunto-botao .botao {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 120px;
    }

    .interna .assunto-botao span {
        text-align: center;
    }

    /* INFORMATIVOS */
    .container-sidebar {
        width: 300px;
        margin-left: 30px;
    }

    .container-legislacao {
        margin-top: 30px;
        border-radius: 5px;
        width: 100%;
        background-color: #f5f5f5;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    }

    .legislacao-conteudo {
        width: 180px;
        margin-left: auto;
        margin-right: auto;
        padding: 24px 0;
    }

    .legislacao-titulo {
        font-size: 2.4rem;
        font-weight: 700;
        letter-spacing: -1px;
        padding-bottom: 30px;
    }

    .legislacao-botao {
        margin-bottom: 24px;
        border: 1px solid #9a9a9a;
        background-color: transparent;
        border-radius: 5px;
        min-height: 64px;
        display: flex;
        align-items: center;
    }

    .legislacao-botao:last-of-type {
        margin-bottom: 0;
    }

    .legislacao-botao a {
        color: #9a9a9a;
        text-decoration: none;
        font-size: 1.6rem;
        font-weight: 700;
    }

    .legislacao-botao img {
        margin: 0 8px 0 4px;
    }

    .legislacao-botao span {
        vertical-align: sub;
    }

    .legislacao-observacao {
        padding: 30px 8px;
        font-size: 1.2rem;
    }
    </style>

<?php
    endwhile;
endif;

get_footer();
?>