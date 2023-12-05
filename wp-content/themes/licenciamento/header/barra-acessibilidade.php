<?php

?>
<script>

</script>

<div id="acessivel" class="d-none d-sm-none d-md-none d-lg-block">
    <div class="wrapper-acess">
        <div id="acess-pular-conteudo" class="acess-item">
            <ul>
                <li>
                    <a accesskey="1" href="#conteudo-principal">Ir para conteúdo <span>[1]</span></a>
                </li>
                <li>
                    <a accesskey="2" href="#menu-principal">Ir para menu <span>[2]</span></a>
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
                        <button type="button" onclick="tamanhoFonte(1)" aria-label="Aumentar tamanho da fonte">
                            <?= carregar_svg('acess-aumentar-texto.svg') ?>
                        </button>
                    </li>
                    <li>
                        <button type="button" onclick="tamanhoFonte(-1)" aria-label="Diminuir tamanho da fonte">
                            <?= carregar_svg('acess-diminuir-texto.svg') ?>
                        </button>
                    </li>
                    <li>
                        <button type=button onclick="alternarContraste()" aria-label="Modo de alto contraste"
                            class="menu-item-acessibilidade">
                            <?= carregar_svg('acess-alto-contraste.svg') ?>ALTO CONTRASTE
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

<script>

    const elemRoot = document.documentElement;
    const estiloComputado = window.getComputedStyle(elemRoot);
    const tamanhoFonteAtual = getCookie('fonte');
    elemRoot.style.fontSize = tamanhoFonteAtual + "px";

    function getCookie(nome) {
        const nomeCookie = nome + "=";
        const cookies = document.cookie.split(';');

        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].trim();

            if (cookie.indexOf(nomeCookie) === 0) {
                return cookie.substring(nomeCookie.length, cookie.length);
            }
        }
        // Tamanho padrão da fonte caso não exista cookie salvo
        return "10";
    }

    function saveCookie(tamanhoFonte) {
        const nome = 'fonte';
        const validade = '';
        const local = 'path=/';
        document.cookie = nome + "=" + (tamanhoFonte || "") + validade + "; " + local;
    }

    function tamanhoFonte(valor) {
        const elemRoot = document.documentElement;
        const estiloComputado = window.getComputedStyle(elemRoot);
        const tamanhoFonteRoot = estiloComputado.fontSize;
        const tamanhoFonteMin = 5;
        const tamanhoFonteMax = 20;
        let tamanhoFonteAtual = parseFloat(tamanhoFonteRoot);

        // Cancela a operação caso tamanhoFonte não seja definido em px
        if (!tamanhoFonteRoot.includes('px')) return;

        if ((valor > 0 && tamanhoFonteAtual < tamanhoFonteMax) || (valor < 0 && tamanhoFonteAtual > tamanhoFonteMin))
            tamanhoFonteAtual += valor;

        saveCookie(tamanhoFonteAtual);

        elemRoot.style.fontSize = tamanhoFonteAtual + "px";
    }

    function alternarContraste() {

        var className = 'contraste-acessivel';
        var el = document.querySelectorAll('acessivel');
        
        el.classList.add(className);

    }

</script>

<style>
</style>