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
                        <a href="#" aria-label="Aumentar tamanho da fonte"  onclick="aumentarTexto()">
                            <?= carregar_svg( 'acess-aumentar-texto.svg' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="Diminuir tamanho da fonte" onclick="diminuirTexto()">
                            <?= carregar_svg( 'acess-diminuir-texto.svg' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="Modo de alto contraste" onclick="alternarContraste()">
                            <?= carregar_svg( 'acess-alto-contraste.svg' ) ?> ALTO CONTRASTE
                        </a>
                    </li>
                </ul>
            </div>
            <div id="acess-links" class="acess-item">
                <ul>
                    <li>
                        <a href="https://www.capital.sp.gov.br/acessibilidade/"><?= carregar_svg( 'acess-acessibilidade.svg' ) ?> ACESSIBILIDADE</a>
                    </li>
                    <li>
                        <a href="/<?= get_page_by_title( 'Mapa do Site' )->post_name ?>"><?= carregar_svg( 'acess-mapa-do-site.svg' ) ?> MAPA</a>
                    </li>
                    <li><a href="">Fale Conosco</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>