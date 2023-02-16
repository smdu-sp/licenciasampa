<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref, onMounted, computed, watch } from 'vue';
import axios from 'axios';

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

            avisos.value.push(avisosRaw[key]);
          }
        });
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
                  <a :href="aviso.url" :aria-label="descricao_url">
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
                  src="/assets/svg/seta-direita.svg"
                ></InlineSvg>
              </template>
              <template #prev>
                <InlineSvg
                  src="/assets/svg/seta-esquerda.svg"
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
:root {
  /* Cor dos grupos */
  --aba-grupo1: #395aad;
  --aba-grupo2: #517bee;
  --aba-grupo3: #5cd6c9;
  --aba-grupo4: #f28d2f;
  --aba-grupo5: #4d4e4e;
  --bg-grupo1: #c2cbe2;
  --bg-grupo2: #ebf0ff;
  --bg-grupo3: #defffb;
  --bg-grupo4: #ffeede;
  --bg-grupo5: #ddd;
}

.slide-container {
  padding: 5px 50px 10px 50px;
  align-content: flex-start;
  min-height: 740px;
}

.card-avisos-container {
  padding-top: 25px;
  padding-bottom: 25px;
  padding-right: 15px !important;
  padding-left: 15px !important;
  height: fit-content;
}

.carousel-avisos {
  width: 1030px;
  margin-left: auto;
  margin-right: auto;
}

.carousel-avisos .card-avisos-container:nth-of-type(n + 7) {
  padding-bottom: 0;
}

.card-avisos {
  min-height: 200px;
  width: 100%;
  background-color: #fbfbfb;
  color: #333;
  font-size: 20px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  border-radius: 5px;
  padding: 20px;
  position: relative;
  box-shadow: 3px 1px 13px 1px rgba(0, 0, 0, 0.1);
}

.card-decoracao {
  position: absolute;
  right: 0;
  top: 0;
  height: 44px;
  width: 20%;
  border-bottom-left-radius: 100px;
  border-top-right-radius: 12px;
  transition: 0.3s;
}

.card-avisos.hover .card-decoracao {
  background-color: transparent !important;
}

.card-avisos.hover h3 {
  color: var(--blue100);
  text-decoration: underline;
  transition: 0.3s;
}

.card-avisos.hover p {
  margin-bottom: 0;
  margin-top: 10px;
  transition: 0.3s;
}

.card-avisos * {
  font-family: Roboto, Arial, sans-serif;
  text-align: left;
}

.card-avisos h3 {
  font-size: 1.9rem;
  line-height: 1.4;
  font-weight: 700;
  padding-right: 20px;
}

.card-avisos p {
  font-size: 1.6rem;
  font-weight: 400;
  line-height: 1.1;
}

.container-carousel-avisos {
  padding-top: 50px;
  padding-bottom: 50px;
}

.container-abas-avisos {
  display: flex;
  flex: 1;
}

.avisos-container {
  height: 280px;
  padding: 0 75px;
  width: 100%;
}

.carousel-avisos {
  background-image: url("assets/bg-avisos.png");
}

.avisos-titulo, .avisos-texto {
  color: #fff;
  font-family: Roboto;
}

.avisos-titulo h3 {
  font-size: 26px !important;
  display: block;
  font-weight: 700;
  letter-spacing: -1px;
  text-align: left;
}

.avisos-texto p {
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

svg {
  filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.3));
}
</style>
