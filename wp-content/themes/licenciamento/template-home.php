<?php
/*
Template Name: Home
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <div id="conteudo-principal" class="home secao topo" style="" data-section-id="e965c998d8c">
      <div class="row wrapper">
        <div class="container-introducao col-md">
          <div class="introducao">
            <div class="introducao-box">
              <h1 id="titulo-logo">
                <img src="/assets/home-logo-licencia-sampa-2x.png" alt="Licencia Sampa" aria-label="Licencia Sampa">
              </h1>
              <p class="paragrafo-edit">O principal canal de acesso para todos os sistemas de licenciamento eletrônico da Prefeitura de São Paulo. Aqui você encontrará informações sobre aprovação de projetos, cadastro e manutenção de equipamentos de segurança, autorização para eventos, regularização de edificação, parcelamento do solo, análises técnicas e emissão de documentos que controlam atividades edilícias, além de diversos outros serviços.
              </p>
            </div>
          </div>
        </div>
        <p class="paragrafo-topo-mobile" style="display: none;">
          O principal canal de acesso para todos os sistemas de licenciamento eletrônico da Prefeitura de São Paulo.
        </p>
        <div class="container-acesso-rapido col-md">
          <div class="acesso-rapido">
            <div class="acesso-rapido-box">
              <h2>Possui solicitação em andamento ou já sabe como solicitar?</h2>
              <p>Consulte o sistema desejado com mais praticidade através do acesso rápido.</p>
              <button class="botao-azul" type="button" onclick="location.href='#'">Acesso Rápido</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-aviso">
      <p>
      </p>
      <div class="home secao indice">
        <div class="wrapper">
          <div class="container-indice">
            <div class="indice-titulo">
              <h2>Verifique os documentos, serviços e informações disponíveis:</h2>
            </div>
            <div id="appIndice" class="indice">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home secao avisos">
      <div class="wrapper">
        <div class="container-avisos">
          <div class="avisos-titulo">
            <h2>Avisos</h2>
          </div>
          <div id="appAvisos" class="avisos">
          </div>
        </div>
      </div>
    </div>

    <?php
    $host = $_SERVER['HTTP_HOST'];
    if ($host !== 'localhost') {
      wp_enqueue_script('vue-app', '/js/main.js');
      wp_enqueue_style('vue-app', '/css/main.css');
    } else { ?>
      <script type="module" src="http://localhost:5173/@vite/client"></script>
    <?php }
    ?>

<?php
  endwhile;
endif;

get_footer();
?>

<style>
  @media (max-width: 1200px) {
    .container-indice .container-carousel-indice {
      display: none;
    }

    .container-mobile-indice a {
      display: flex;
      justify-content: center;
    }

    .container-indice {
      padding: 0 31px;
    }

    .indice-titulo {
      padding: 31px 86px 41px 130%;
      padding-left: calc(var(--bs-gutter-x) * .5);
      color: #333;
      font-feature-settings: 'liga' off;
      font-family: Roboto;
      font-size: 14px;
      font-style: normal;
      font-weight: 500;
      line-height: normal;
      letter-spacing: 0.014px;
    }

    .container-avisos{
      display: none;
    }
  }

  @media (min-width: 1200px) {
    .container-mobile-indice {
      margin: 50px 0px !important;
      display: none;
    }
  }

  @media (max-width: 767px) {

    .container-introducao,
    .container-acesso-rapido {
      display: flex;
      justify-content: center;
    }
  }

  @media (max-width: 360px) {

    .container-introducao,
    .container-acesso-rapido {
      display: none;
    }

    .paragrafo-topo-mobile {
      display: grid !important;
      color: #FFF;
      text-shadow: 2px 4px 31px rgba(0, 0, 0, 0.65);
      font-size: 16px;
      font-weight: 500;
      letter-spacing: 0.016px;
      padding: 7px 0 0 30px;
    }

    .topo{
      height: 88.147px !important;
    }
    #conteudo-principal.home.secao.topo{
      background-size: 361.088px 88.147px !important;
      padding-top: 0px !important;
    }
  }
</style>