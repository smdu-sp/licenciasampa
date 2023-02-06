<?php
/*
Template Name: Home
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

  the_content();

?>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
  endwhile;
endif;

get_footer();
?>