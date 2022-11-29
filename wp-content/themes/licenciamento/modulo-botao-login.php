<?php
    
    ob_start();
    if (!is_page("perfil")) { ?>
        <a href="/login">Entrar</a>    
    <?php
    } else { ?>
        <div class="container-login">
            <div><img src="/assets/foto-perfil.jpg" alt="Miniatura da foto do perfil"></div>
            <div class="icone-triangulo-baixo"></div>
        </div>
        <style>
            .container-login {
                display: flex;
                width: 80px;
                height: 60px;
                justify-content: center;
                align-items: center;
                background-color: #fff;
                border-radius: 10px;
                border: 1px rgba(47,47,47,0.75) solid;
            }

            .container-login:hover {
                cursor: pointer;
            }

            .icone-triangulo-baixo {
                display: block;
                content: "";
                width: 12px;
                border-top: 6px solid #444;
                border-left: 6px solid #fff;
                border-right: 6px solid #fff;
                margin-left: 5px;
            }
        </style>
    <?php
    }
?>

