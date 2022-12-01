<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref, onMounted } from 'vue';
import axios from 'axios';

import '@assets/css/carousel.css';
import setaDireita from '@assets/svg/seta-direita.svg';
console.log(setaDireita)

let grupos = [
  {
    grupo: 'obras',
    titulo: 'Obras, Regularização e Parcelamento',
  },
  {
    grupo: 'seguranca',
    titulo: 'Segurança, Acessibilidade, e Equipamentos',
  },
  {
    grupo: 'eventos',
    titulo: 'Eventos',
  },
  {
    grupo: 'solicitacoes',
    titulo: 'Solicitações Gerais',
    subtitulo: '(Edificação, Loteamento, Logradouro e Atividades)',
  },
  {
    grupo: 'outros',
    titulo: 'Outras Informações',
  },
  {
    grupo: 'indefinido',
    titulo: 'A definir',
  },
]

grupos.forEach((grupo, indice) => {
  grupo['cor'] = `--grupo${indice + 1}`;
});

console.log(grupos);

const postsAgrupados = ref({});

onMounted(() => {
  axios
    .get('/wp-json/wp/v2/pages/?per_page=100')
    .then(response => {
        const postsRaw = response.data;
        postsRaw.forEach(post => {
          const grupo = post.meta.grupo
          if (grupo !== '') {
            if (grupo in postsAgrupados.value === false) {
              postsAgrupados.value[grupo] = [];
            }
            postsAgrupados.value[grupo].push(post);
          }
        });
        console.log(postsAgrupados.value);
    });
});
</script>

<template>
  <div class="container-carousel-indice">
    <div class="carousel-indice" v-for="grupo, key in grupos" :key="`grupo-${key}`">
      <Carousel>
        <Slide v-for="slide in 10" :key="slide">
          <div class="carousel__item" :style="`background-color: var(${grupo.cor})`">{{ slide }}</div>
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
          <Pagination
            :style="`background-color: var(${grupo.cor})`"
           />
        </template>
      </Carousel>
    </div>
  </div>
</template>

<style>
:root {
  /* Cor dos grupos */
  --grupo1: #395aad;
  --grupo2: #517bee;
  --grupo3: #5cd6c9;
  --grupo4: #f28d2f;
  --grupo5: #f96a86;
  --grupo6: #333;
}

.carousel__item {
  min-height: 400px;
  width: 100%;
  background-color: var(--vc-clr-primary);
  color: var(--vc-clr-white);
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
