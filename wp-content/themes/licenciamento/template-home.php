<?php
/*
Template Name: Home
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

?>

    <div id="conteudo-principal" class="home secao topo" style="background-image: url('/assets/home-bg-topo-2x.png');" data-section-id="e965c998d8c">
    <div class="wrapper" class="row">
      <div class="container-introducao col-6">
        <div class="introducao">
          <div class="introducao-box">
            <h1 id="titulo-logo">
              <img src="/assets/home-logo-licencia-sampa-2x.png" alt="Licencia Sampa" aria-label="Licencia Sampa">
            </h1>
            <p>O principal canal de acesso para todos os sistemas de licenciamento eletrônico da Prefeitura de São Paulo. Aqui você encontrará informações sobre aprovação de projetos, cadastro e manutenção de equipamentos de segurança, autorização para eventos, regularização de edificação, parcelamento do solo, análises técnicas e emissão de documentos que controlam atividades edilícias, além de diversos outros serviços.</p>
          </div>
        </div>
      </div>
      <div class="container-acesso-rapido col-6">
        <div class="acesso-rapido">
          <div class="acesso-rapido-box">
            <h2>Possui solicitação em andamento ou já sabe como solicitar?</h2>
            <p>Consulte o sistema desejado com mais praticidade através do acesso rápido.</p>
            <button class="botao-azul" type="button" onclick="location.href='#'">Acesso Rápido</button>
          </div>
        </div>
        <div id="appPesquisa" class="pesquisa-container"></div>
      </div>
    </div>
  </div>

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
      wp_enqueue_script( 'vue-app', '/js/main.js' );
      wp_enqueue_style( 'vue-app', '/css/main.css' );
    } else { ?>
      <script type="module" src="http://localhost:5173/@vite/client"></script>
    <?php }
  ?>

<?php
  endwhile;
endif;

get_footer();
?>