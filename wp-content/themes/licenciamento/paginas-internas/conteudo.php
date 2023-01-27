<?php 
    $textoIntroducao = get_field( "o_que_e" );
    $assuntos = get_field( "assuntos" );
    $assuntos["ativo_1"] = 1;
    $botoes_sistemas = get_field( "botoes_sistemas", $idBotoes );
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
    <div id="accordion-<?= $i ?>" class="container-accordion">
        <div class="assunto-titulo">
            <h3>
                <button type="button"
                        class="botao-abrir"
                        id="accordion-header-<?= $i ?>"
                        aria-expanded="false"
                        aria-controls="accordion-panel-<?= $i ?>"
                        data-accordion-header>
                    <?= $assuntos["titulo_{$i}"] ?><img src="/assets/svg/seta-baixo-accordion.svg" alt="Seta abrir" aria-hidden="true">
                </button>
            </h3>
        </div>
        <section class="assuntos-accordion"
                    id="accordion-panel-<?= $i ?>"
                    aria-labelledby="accordion-header-<?= $i ?>"
                    aria-hidden="true"
                    inert>
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
                </section>
    </div>
    <?php
        }
    }
    ?>
</div>

<script>
const accordionHeaders = document.querySelectorAll('[data-accordion-header]');
Array.prototype.forEach.call(accordionHeaders, accordionHeader => {
  const titulo = accordionHeader.parentElement.parentElement;
  const conteudo = titulo.nextElementSibling;
  accordionHeader.onclick = () => {
    const expanded = accordionHeader.getAttribute('aria-expanded') === 'true' || false;
    accordionHeader.setAttribute('aria-expanded', !expanded);
    conteudo.inert = expanded;
    conteudo.setAttribute('aria-hidden', expanded);
    titulo.classList.toggle('aberto', !expanded);
  }
});
</script>
