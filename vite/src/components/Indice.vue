<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref, onMounted, computed, watch } from 'vue';
import axios from 'axios';

import '@assets/css/carousel.css';

const itensPorSlide = 9;

const grupos = ref([]);

grupos.value = [
  {
    nome: 'obras',
    titulo: 'Obras, Regularização e Parcelamento',
  },
  {
    nome: 'seguranca',
    titulo: 'Segurança, Acessibilidade, e Equipamentos',
  },
  {
    nome: 'eventos',
    titulo: 'Eventos',
  },
  {
    nome: 'solicitacoes',
    titulo: 'Solicitações Gerais',
    subtitulo: '(Edificação, Loteamento, Logradouro e Atividades)',
  },
  {
    nome: 'outros',
    titulo: 'Outras Informações',
  }
];

grupos.value.forEach((grupo, indice) => {
  grupo['corPrimaria'] = `--aba-grupo${indice + 1}`;
  grupo['corSecundaria'] = `--bg-grupo${indice + 1}`;
});

const grupoSelecionado = ref(0);
const postsAgrupados = ref({});
const abaHover = ref(null);
const cardHover = ref(null);

function corElementos(intGrupo) {
  const indice = intGrupo;
  const root = document.querySelector(':root');
  const svgPrev = document.querySelectorAll('.carousel-indice .carousel__prev svg g path');
  const svgNext = document.querySelectorAll('.carousel-indice .carousel__next svg g path');

  // Executa novamente caso os elementos ainda não tenham carregado
  if (svgPrev.length === 0 || svgNext.length === 0) {
    window.setTimeout(() => {
      corElementos(indice);
    }, 50);
    return;
  }

  // Cor do Pagination  
  root.style.setProperty('--vc-pgn-active-color', `var(--aba-grupo${intGrupo + 1})`);

  // // Cores dos SVGs prev e next
  svgPrev.forEach(svg => {
    svg.setAttribute('fill', `var(--aba-grupo${intGrupo + 1})`)
  });
  svgNext.forEach(svg => {
    svg.setAttribute('fill', `var(--aba-grupo${intGrupo + 1})`);
  });
}

watch(grupoSelecionado, () => {
  corElementos(grupoSelecionado.value);
});

onMounted(() => {
  // Resgata as postagens
  axios
    .get('/wp-json/wp/v2/pages/?per_page=100')
    .then(response => {
        const postsRaw = response.data;
        let postsOrdenados = [];

        postsRaw.forEach(post => {
          if (post.meta.priorizar) {
            postsOrdenados.push(post);
          }
        });

        postsRaw.forEach(post => {
          if (!post.meta.priorizar) {
            postsOrdenados.push(post);
          }
        });

        console.log(postsOrdenados)

        postsOrdenados.forEach(post => {
          const grupo = post.meta.grupo
          if (grupo !== '') {
            if (grupo in postsAgrupados.value === false) {
              postsAgrupados.value[grupo] = { 
                slides: [[]]
              };
            }

            let slides = postsAgrupados.value[grupo]['slides'];

            // Separa as postagens para paginação do carousel
            let indiceAtual = slides.length - 1;
            if (slides[indiceAtual].length >= itensPorSlide) {
              slides.push([]);
              indiceAtual += 1;
            }

            slides[indiceAtual].push(post);
          }
        });

        // 
        grupos.value.forEach(grupo => {
          if (grupo.nome in postsAgrupados.value) {
            grupo['slides'] = postsAgrupados.value[grupo.nome]['slides'];
          }
        });
    })
    .finally(() => {
      corElementos(grupoSelecionado.value);
    });
});

</script>

<template>
  <div class="container-carousel-indice">
    <div class="container-abas-indice">
      <button
        class="aba-indice"
        :class="{ selecionado: grupoSelecionado === key, hover: abaHover === key }"
        :style="grupoSelecionado === key || abaHover === key ? `background-color: var(${grupo.corPrimaria}); color: #fff` : ''"
        type="button" v-for="grupo, key in grupos" :key="`grupo-${key}`"
        @click="grupoSelecionado = key"
        @mouseover="abaHover = key"
        @mouseout="abaHover = null"
      >
            <span class="aba-titulo">
              {{ grupo.titulo.toUpperCase() }}
            </span>
            <span class="aba-subtitulo" v-if="grupo.subtitulo && grupo.subtitulo.length > 0">
              {{ grupo.subtitulo }}
            </span>
      </button>
    </div>
    <div class="carousel-indice" v-for="grupo, keyGrupo in grupos" :key="`grupo-${keyGrupo}`">
      <template v-if="grupo.slides && grupo.slides.length > 0">
        <Carousel v-show="keyGrupo === grupoSelecionado">
          <Slide v-for="slide, keySlide in grupo.slides" :style="`background-color: var(${grupo.corSecundaria})`" :key="`slide-${keySlide}`">
            <div class="h-100 w-100 row slide-container">
              <div v-for="card, keyCard in slide" class="carousel__item col-4 card-indice-container" :key="`card-${keyCard}`">
                <a :href="card.link">
                  <div
                    class="card-indice"
                    :class="cardHover === keyCard ? 'hover' : ''"
                    @mouseover="cardHover = keyCard" 
                    @mouseout="cardHover = null"
                  >
                    <div class="card-decoracao" :style="`background-color: var(${grupo.corPrimaria});`"></div>
                    <h3>
                      {{ card.meta.titulo ? card.meta.titulo : card.title.rendered }}
                    </h3>
                    <p>{{ card.meta.descricao }}</p>
                  </div>
                </a>
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
            <Pagination
              :style="`background-color: var(${grupo.corSecundaria})`"
            />
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

.indice-titulo {
  color: #333333;
  font-weight: 500;
  font-size: 26px;
  padding-top: 120px;
  padding-left: 75px;
}

.slide-container {
  padding: 5px 50px 10px 50px;
  align-content: flex-start;
  min-height: 740px;
}

.card-indice-container {
  padding-top: 25px;
  padding-bottom: 25px;
  padding-right: 15px !important;
  padding-left: 15px !important;
  height: fit-content;
}

.carousel-indice .card-indice-container:nth-of-type(n + 7) {
  padding-bottom: 0;
}

.card-indice {
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

.card-indice.hover .card-decoracao {
  background-color: transparent !important;
}

.card-indice.hover h3 {
  color: var(--blue100);
  text-decoration: underline;
  transition: 0.3s;
}

.card-indice.hover p {
  margin-bottom: 0;
  margin-top: 10px;
  transition: 0.3s;
}

.card-indice * {
  font-family: Roboto, Arial, sans-serif;
  text-align: left;
}

.card-indice h3 {
  font-size: 1.9rem;
  line-height: 1.4;
  font-weight: 700;
  padding-right: 20px;
}

.card-indice p {
  font-size: 1.6rem;
  font-weight: 400;
  line-height: 1.1;
}

.container-carousel-indice {
  padding-top: 50px;
  padding-bottom: 50px;
}

.container-abas-indice {
  display: flex;
  flex: 1;
}

.aba-indice {
  flex: 1 1 0;
  background-color: #f8f8f8;
  border-left: 3px solid #d9d9d9;
  padding: 10px 8px 10px 8px;
  margin-top: 10px;
}

.aba-indice.selecionado,
.aba-indice.hover {
  margin-top: 0px;
  transition: margin 1s, padding 1s, color 1s, background-color 1s, border 0s;
  padding-top: 20px;
  border-left: 3px solid transparent;
}

.aba-indice:last-of-type {
  border-right: 3px solid #d9d9d9;
}

.aba-indice:last-of-type.selecionado,
.aba-indice:last-of-type.hover {
  border-right: 3px solid transparent;
}

.aba-indice .aba-titulo, 
.aba-indice .aba-subtitulo {
  display: block;
  text-align: center;
}

.aba-indice .aba-titulo {
  font-size: 16px;
  font-weight: 700;
}

.aba-indice .aba-subtitulo {
  font-size: 14px;
  font-weight: 400;
}

svg {
  filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.3));
}
</style>
