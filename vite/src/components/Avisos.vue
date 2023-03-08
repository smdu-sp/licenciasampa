<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref, onMounted, computed, watch } from 'vue';
import axios from 'axios';

import { DateTime } from 'luxon';

import '@assets/css/carousel.css';

const avisos = ref([]);

function formatarTexto(string) {
  return string.replaceAll('\n', '<br>');
}

onMounted(() => {
  // Resgata as postagens
  axios
    .get('/wp-json/wp/v2/pages?slug=avisos')
    .then(response => {
        const postRaw = response.data[0];
        const avisosRaw = postRaw.acf.avisos;
        
        Object.keys(avisosRaw).forEach(key => {
          if (avisosRaw[key] !== null && avisosRaw[key].titulo.length > 0) {
            // Verifica se a data do aviso é válida 
            let data = avisosRaw[key].data_publicacao;

            if (DateTime.fromSQL(data).invalid) {
              avisosRaw[key].data_publicacao = DateTime.local(2000).toSQL();
            }

            avisos.value.push(avisosRaw[key]);
          }
        });

        // Ordena os avisos por data de publicação, mais recentes primeiro
        avisos.value.sort((a,b) => {
          a = DateTime.fromSQL(a.data_publicacao);
          b = DateTime.fromSQL(b.data_publicacao);
          return b.diff(a).milliseconds;
        })
    })
    .finally(() => {
      
    });
});

</script>

<template>
  <div class="container-carousel-avisos">
    <div class="carousel-avisos">
      <template v-if="avisos && avisos.length > 0">
        <Carousel>
          <Slide v-for="aviso, keySlideAviso in avisos" :style="``" :key="`aviso-${keySlideAviso}`">
            <div class="avisos-container carousel__item">
              <div class="aviso-container">                
                <div class="avisos-titulo">
                  <h3>{{ aviso.titulo }}</h3>
                </div>
                <div class="avisos-texto">
                  <p v-html="formatarTexto(aviso.texto)">
                  </p>
                </div>
                <div class="avisos-botao">
                  <a :href="aviso.url" :aria-label="aviso.descricao_url">
                    <div class="botao">{{ aviso.texto_url }}</div>
                  </a>
                </div>
              </div>              
            </div>
          </Slide>
          
          <template #addons>
            <Navigation>
              <template #next>
                <InlineSvg
                  src="/assets/svg/avisos-seta-direita.svg"
                ></InlineSvg>
              </template>
              <template #prev>
                <InlineSvg
                  src="/assets/svg/avisos-seta-esquerda.svg"
                ></InlineSvg>
              </template>
            </Navigation>
          </template>
        </Carousel>
      </template>
    </div>
  </div>
</template>

<style>
.carousel-avisos {
  width: 1030px;
  margin-left: auto;
  margin-right: auto;
}

.container-carousel-avisos {
  padding-top: 30px;
  padding-bottom: 100px;
}

.avisos-container {
  height: 280px;
  padding: 0 75px;
  width: 100%;
}

.carousel-avisos {
  background-image: url("/assets/bg-avisos.png");
}

.avisos-titulo, .avisos-texto {
  color: #fff;
  font-family: Roboto;
}

.avisos-titulo h2 {
  color: #395aad;
  font-weight: 500;
  font-size: 26px;
  padding-left: 75px;
}

.avisos-titulo h3 {
  margin-bottom: 10px;
  font-size: 26px !important;
  display: block;
  font-weight: 700;
  letter-spacing: -1px;
  text-align: left;
}

.avisos-texto p {
  margin-bottom: 40px;
  font-size: 16px !important;
  display: block;
  font-weight: 500;
  letter-spacing: -1px;
  text-align: left;
}

.avisos-botao {
  text-align: left;
}

.avisos-botao a {
  color: var(--white01);
  font-weight: 500;
  font-size: 1.6rem;
}

.avisos-botao .botao {
  background: rgba(255, 255, 255, 0.22);
  border: 1px solid var(--white01);
  border-radius: 8px;
  width: fit-content;
  min-width: 160px;
  padding: 4px 30px;
  text-align: center;
}

.aviso-container {
  height: 100%;
  display: flex; flex-direction: column; justify-content: center;
}
</style>
