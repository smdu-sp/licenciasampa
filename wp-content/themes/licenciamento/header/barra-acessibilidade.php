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
                    <a accesskey="2" href="#menu-menu-principal">Ir para menu <span>[2]</span></a>
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
                        <button type="button" onclick="aumentarTexto()" aria-label="Aumentar tamanho da fonte">
                            <?= carregar_svg( 'acess-aumentar-texto.svg' ) ?>
                        </button>
                    </li>
                    <li>
                        <button type="button"  onclick="diminuirTexto()" aria-label="Diminuir tamanho da fonte">
                            <?= carregar_svg( 'acess-diminuir-texto.svg' ) ?>
                        </button>
                    </li>
                    <li>
                        <button type=button onclick="alternarContraste()" aria-label="Modo de alto contraste" >
                            <?= carregar_svg( 'acess-alto-contraste.svg' ) ?> ALTO CONTRASTE
                        </button>
                    </li>
                </ul>
            </div>
            <div id="acess-links" class="acess-item">
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'acess-menu',
                            'menu_class' => 'menu_container'
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</div>