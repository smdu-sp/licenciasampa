<?php 
    $textoIntroducao = get_field( "o_que_e" );
    $assuntos = get_field( "assuntos" );
    $assuntos["ativo_1"] = 1;
    $botoes_sistemas = get_field( "botoes_sistemas", 1792 );
?>

<div class="conteudo-interna">
    <div class="subtitulo">
        <h2>O que é?</h3>
    </div>
    <?php if ($textoIntroducao) { ?>
        <div><?= wpautop($textoIntroducao) ?></div>
    <?php } ?>
    <div class="subtitulo">
        <h2>Canais para solicitar</h3>
    </div>
    <?php for ($i=1; $i <= 3; $i++) { 
        if ($assuntos["ativo_{$i}"] && $assuntos["titulo_{$i}"]) {
    ?>
    <div class="assuntos-accordion">
        <div class="assunto-titulo">
            <h3><?= $assuntos["titulo_{$i}"] ?></h3>
        </div>
        <div class="assunto-sistemas">
            <?php foreach ($assuntos["sistemas_{$i}"] as $key => $sistema) { ?>
                <div class="assunto-conteudo">
                    <div class="assunto-texto">
                        <?= wpautop($assuntos["textos_{$i}"][$sistema]) ?>
                    </div>
                    <div class="assunto-botao">
                        <a href="<?= $botoes_sistemas[$sistema]["url"] ?>">
                            <div class="botao">
                                <span><?= $botoes_sistemas[$sistema]["texto"] ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>
