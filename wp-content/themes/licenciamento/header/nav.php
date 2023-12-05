<?php

?>

<div id="nav">
    <div class="wrapper-header">
        <a class="logos img-licencia-sampa" href="/" aria-label="Página Inicial">
            <img class="logo-licencia-sampa" src="/assets/header-logo-licencia-sampa.png" alt="Logo Licencia Sampa">
            <img class="logo-smul" src="/assets/header-logo-smul.png"
                alt="Logo Prefeitura de São Paulo - Urbanismo e Licenciamento">

        </a>
        <div class="container-logo-smul">
            <a class="logos" href="/" aria-label="Página Inicial">
                <img class="logo-smul" src="/assets/header-logo-prefeitura-cidade-sp.png"
                    alt="Logo Prefeitura de São Paulo - Urbanismo e Licenciamento">   
            </a>
        </div>

        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'nav-menu',
                    'menu_class' => 'menu_container'
                )
            );
        ?>
    </div>
</div>