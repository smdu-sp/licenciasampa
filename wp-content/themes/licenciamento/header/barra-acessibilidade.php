<?php

?>

<div id="acessivel">
    <div class="wrapper-acess">
        <div id="acess-pular-conteudo" class="acess-item">
            <ul>
                <li>
                    <a accesskey="1" href="#conteudo-principal">Ir para conteúdo <span>[1]</span></a>
                </li>
                <li>
                    <a accesskey="2" href="#dslc-module-74gbp6bi7o">Ir para menu <span>[2]</span></a>
                </li>
                <li>
                    <a accesskey="4" href="#rodape">Ir para rodapé <span>[4]</span></a>
                </li>
            </ul>
        </div>
        <div class="acess-item">
            <div id="acess-ajuste-conteudo" class="acess-item">
                <ul>
                    <li>
                        <a href="#" aria-label="Aumentar tamanho da fonte">
                            <?= carregar_svg('acess-aumentar-texto.svg') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="Diminuir tamanho da fonte"><img src="/assets/svg/acess-diminuir-texto.svg" alt="Diminuir tamanho da fonte" aria-hidden="true" onclick="diminuirTexto()" /></a>
                    </li>
                    <li>
                        <a href="#" aria-label="Modo de alto contraste"><img src="/assets/svg/acess-alto-contraste.svg" alt="Alto contraste" aria-hidden="true" />ALTO CONTRASTE</a>
                    </li>
                </ul>
            </div>
            <div id="acess-links" class="acess-item">
                <ul>
                    <li>
                        <a href=""><img src="/assets/svg/acess-acessibilidade.svg" alt="Acessibilidade" aria-hidden="true" />ACESSIBILIDADE</a>
                    </li>
                    <li>
                        <a href=""><img src="/assets/svg/acess-mapa-do-site.svg" alt="Mapa do site" aria-hidden="true" />MAPA</a>
                    </li>
                    <li><a href="">Fale Conosco</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>