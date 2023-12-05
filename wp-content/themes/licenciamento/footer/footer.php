<!DOCTYPE html>
<footer>
    <div class="voltar-topo">
        <span><a href="#conteudo-principal">Voltar ao topo</a></span>
    </div>
    <div class="footer-container">
        <div class="wrapper">
            <div>
                <a class="logos-footer" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/licenciamento/">
                    <img id="img-cidade-sampa" src="/assets/svg/footer_Sampa_logo_branco.png" alt="">
                    <img id="img-footer-licencia" src="/assets/svg/footer_urbanismo_ licenciamento_branco.png" alt="">
                </a>
            </div>
            <div class="adress">
                <h4 class="titulo-footer">
                    Secretaria Municipal de <br>Urbanismo e Licenciamento
                </h4 class="titulo-footer">
                <address>
                    Rua São Bento, 405, Centro - 8º, 17º, 18º, <br>19°, 20°, 21° e 22° andar CEP 01011-100 -<br> São
                    Paulo - SP
                </address>
            </div>
            <div class="container-divisoria">
                <div class="divisoria">
                    <span></span>
                </div>
            </div>

            <div class="links-footer">

                <div class="links-query">
                    <h4 class="titulo-footer">Institucional</h4>
                    <ul>
                        <li><a href="#">Área do Servidor</a></li>
                        <li><a href="http://10.75.39.157/manuais-de-ajuda/">Manual de Sistemas</a></li>
                        <li><a href="http://10.75.39.157/acesso-rapido/">Acesso Rápido</a></li>
                        <li><a href="http://10.75.39.157/mapa-do-site/">Mapa do Site</a></li>
                    </ul>
                </div>

                <p>
                    Em caso de dúvidas,<br>
                    entre em contato pelo email: <br>
                    licenciamento@prefeitura.sp.gov.br
                </p>
            </div>
            <div class="redes-sociais">
                <h4 class="titulo-footer">Redes Sociais</h4>
                <div class="redes-links">
                    <div>
                        <ul>
                            <li><a href="#">
                                    <?= carregar_svg('footer-facebook-icon.svg') ?>
                                </a></li>
                            <li><a href="#">
                                    <?= carregar_svg('footer-twitter-icon.svg') ?>
                                </a></li>
                            <li><a href="#">
                                    <?= carregar_svg('footer-youtube-icon.svg') ?>
                                </a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="#">
                                    <?= carregar_svg('footer-instagram-icon.svg') ?>
                                </a></li>
                            <li><a href="#">
                                    <?= carregar_svg('footer-linkedin-icon.svg') ?>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tel">
                    <?= carregar_svg('footer-phone-icon.svg') ?>
                    <span class="">156</span>
            </div>
        </div>
    </div>
    <div class="row footer-container-mobile">
        <div class="col-md links-footer">
            <h4 class="titulo-footer">Institucional</h4>
            <ul>
                <li><a href="#">Área do Servidor</a></li>
                <li><a href="http://10.75.39.157/manuais-de-ajuda/">Manual de Sistemas</a></li>
                <li><a href="http://10.75.39.157/acesso-rapido/">Acesso Rápido</a></li>
                <li><a href="http://10.75.39.157/mapa-do-site/">Mapa do Site</a></li>
            </ul>
        </div>
        <div class="col-sm contact-footer">
            <div class="tel">
                <a href="tel:156">
                    <?= carregar_svg('footer-phone-icon.svg') ?>
                    <span>156</span>
                </a>
            </div>
            <div class="col-sm email-footer">
                <p>
                    Em caso de dúvidas,<br>
                    entre em contato pelo email: <br>
                    licenciamento@prefeitura.sp.gov.br
                </p>
            </div>
            <div class="col-sm redes-footer-mobile">
                <div>
                    <h5>Redes Sociais</h5>
                </div>
                <div class="redes-footer">
                    <?= carregar_svg('facebook-mobile.svg') ?>
                    <?= carregar_svg('instagram-mobile.svg') ?>
                    <?= carregar_svg('twitter-mobile.svg') ?>
                    <?= carregar_svg('linkedin-mobile.svg') ?>
                    <?= carregar_svg('youtube-mobile.svg') ?>
                </div>


            </div>
        </div>
        <div class="col-md local">
            <div class="logo-sp-mobile">
                <a class="logos-footer-mobile"
                    href="https://www.prefeitura.sp.gov.br/cidade/secretarias/licenciamento/">
                    <img id="img-footer-licencia" src="/assets/svg/footer_urbanismo_ licenciamento_branco.png" alt="">
                </a>
            </div>
            <div class="adress-footer-mobile">
                <h4 class="titulo-footer-mobile">
                    Secretaria Municipal de <br>Urbanismo e Licenciamento
                </h4 class="titulo-footer-mobile">
                <address>
                    Rua São Bento, 405, Centro - 8º, 17º, 18º, <br>19°, 20°, 21° e 22° andar CEP 01011-100 -<br> São
                    Paulo - SP
                </address>
            </div>
        </div>

    </div>

</footer>

</html>

<style>



    .footer-container {
        background-color: #395AAD;
        max-width: 1440px;
        height: 100%;
        padding: 110px 0;
    }

    footer .wrapper {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .logos-footer {
        display: grid;
        flex-grow: 1;
    }

    #img-footer-licencia,
    #img-cidade-sampa {
        width: 139px;
    }

    .titulo-footer {
        color: #5CD6C9;
        font-size: 16px;
        font-weight: 700;
    }

    .adress {
        flex-grow: 1;
        margin: 0 50px;
    }

    .container-divisoria {
        margin-right: 20px;
    }

    .adress,
    .logos-footer {
        padding: 20px 0;
    }

    .adress .titulo-footer {
        padding-top: 20px;
    }

    .titulo-footer {
        margin-bottom: 15px;
        font-size: 16px;
    }

    .divisoria {
        width: 5px;
        height: 197px;
        background-color: #5CD6C9;

    }

    .links-footer,
    .redes-sociais,
    .tel {
        padding-top: 10px;

    }

    .links-footer li {
        padding-bottom: 4px;
    }

    footer p,
    address,
    a {
        color: white;
        text-decoration: none;
        font-size: 14px;
    }

    footer a:hover {
        color: white;
    }

    footer ul {
        display: grid;
    }

    .redes-links {
        display: flex;
        justify-content: space-around;
    }

    .redes-links li {
        padding-bottom: 14px;
        color: #FFF;
    }

    .links-footer p {
        padding-top: 14px;
        color: #FFF;
        font-size: 14px;
        font-weight: 600;
    }

    .tel {
        display: flex;
        align-items: start;
    }

    .tel img {
        height: 42px;
    }

    .contact-footer svg{
        margin-top: -9px !important;
    }

    .tel p {
        color: #FFF;
        font-size: 36px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .voltar-topo {
        width: 100%;
        display: flex;
        justify-content: right;
        background-color: #FFFFFF;
        padding-bottom: 30px;
        background-color: var(--gray400) !important;
    }

    .voltar-topo a {
        color: #0A3299;
        border-bottom: 1px solid #0A3299;
    }

    .voltar-topo a:hover {
        color: #0A3299;
    }

    .footer-container .tel,
    .footer-container .redes-sociais {
        padding-left: 60px;
    }

    .footer-container .tel {
        padding-right: 100px;
    }

    /* footer mobile */

    .footer-container-mobile {
        width: 102vw;
        height: 585px;
        background-color: #333;
        padding: 10px 30px;

    }

    .footer-container-mobile .links-footer {
        width: 100%;
    }

    .footer-container-mobile .links-footer h4 {
        color: #FFF;
        font-size: 14px;
        font-weight: 700;
    }

    .footer-container-mobile .links-footer ul {
        margin-bottom: 30px;
    }

    .contact-footer {
        width: 100%;
    }

    .footer-container-mobile .tel {
        position: static;
        padding: 28px 0;
    }

    .footer-container-mobile .tel img {
        width: 49px;
        height: 25px;

    }

    .email-footer {
        padding-bottom: 15px;
    }

    .email-footer p,
    .redes-footer-mobile h5 {
        color: #FDFFFF;
        font-size: 14px;
        font-weight: 700;
    }

    .redes-footer-mobile {
        padding-bottom: 39px;
    }

    .logo-sp-mobile {
        margin-left: -10px;
    }

    .titulo-footer-mobile {
        color: #FFF;
        font-size: 14px;
        font-weight: 700;
        padding-bottom: 10px;
    }

    .footer-container .tel svg {
        fill: #5CD6C9;
        width: 42px;
        height: 42px;
    }

    .footer-container .tel span {
        color: #FFF;
        font-size: 36px;
        font-weight: 700;
    }

    @media (max-width: 1199px) {
        .footer-container {
            display: none;
        }

        .footer-container-mobile {
            height: 386px;
            display: flex;
            align-items: center;
        }

        .contact-footer {
            border-left: 3px solid #fff;
            padding: 0 70px 0 50px;
        }

        .redes-footer-mobile {
            display: flex;
            align-items: center;
        }

        .redes-footer {
            width: 60%;
            text-align: right;
            padding: 10px 0;
        }

        .redes-footer path {
            width: 20px;
        }

        .tel svg {
            fill: white;
            width: 19px;
        }

        .tel span {
            color: #FFF;
            font-family: Roboto;
            font-size: 24px;
            font-weight: 700;
            padding-top: 6px;
        }

        .links-footer {
            padding-left: 80px;
        }

        .redes-footer svg path {
            width: 18.431px;
            height: 18.431px;
            padding: 0;
        }

        .redes-footer svg path:nth-child(1) {
            width: 18.431px;
            height: 18.431px;
            padding: 0;
            margin-top: 1px;
        }

        .redes-footer svg {
            margin: 2px;
        }


    }

    @media (min-width: 1200px) {

        .footer-container-mobile {
            display: none;
        }
    }

    @media (max-width: 1440px) {
        .voltar-topo{
            padding-right: 30px;
        }
    }

    @media (max-width: 767px) {
        .footer-container-mobile {
            height: 100%;
        }

        .contact-footer {
            border-left: none;
            padding-left: 0px;
        }

        .local {
            padding: 0;
        }

        .links-footer {
            padding: 10px 0 0 0;
        }

        .links-footer,
        .contact-footer {
            border-bottom: 1px solid white;
        }

        .redes-footer-mobile{
            padding-left: -60px;
        }

        .redes-footer {
            text-align: left;
            padding-left: 20px;
        }
        
    }
</style>