<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const inputPesquisa = ref('')
const postsAssuntos = ref([])
const postsPorPesquisa = 8
const postsFiltroPesquisa = computed(() => {
  const postsFiltrados = []

  if (postsAssuntos.value && inputPesquisa.value?.length >= 3) {
    const consultaNormalizada = inputPesquisa.value.normalize('NFD').replace(/\p{Diacritic}/gu, '').toLocaleUpperCase('pt-BR')
    
    for (const post of postsAssuntos.value) {
      const tituloNormalizado = post.title.rendered.normalize('NFD').replace(/\p{Diacritic}/gu, '').toLocaleUpperCase('pt-BR')
      
      if (tituloNormalizado.includes(consultaNormalizada) && postsFiltrados.length <= postsPorPesquisa) {
        const parser = new DOMParser
        const dom = parser.parseFromString(post.title.rendered, 'text/html')
        post.titulo = dom.body.textContent
        postsFiltrados.push(post)
      }
    }
  }

  return postsFiltrados
})

onMounted(() => {
  axios
    .get('/wp-json/wp/v2/pages/?per_page=200')
    .then(response => {
      const postsRaw = response.data

      for (const post of postsRaw) {
        if (post.meta.grupo && post.meta.priorizar) {
          postsAssuntos.value.push(post)
        }
      }
      
      for (const post of postsRaw) {
        if (post.meta.grupo && !post.meta.priorizar) {
          postsAssuntos.value.push(post)
        }
      }
    })
})
</script>

<template>
  <div class="pesquisa-wrapper">
    <input v-model="inputPesquisa" class="input-pesquisa" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar serviço" autocomplete="off">
    <div class="resultados-pesquisa">
    <ul id="resultados-pesquisa" v-show="postsFiltroPesquisa">
      <li v-for="post, index of postsFiltroPesquisa" :key="`titulo-${index}`">
        <a :href="post.link">
          <div v-html="post.titulo"></div>
        </a>
      </li>
    </ul>
    </div>
  </div>
</template>

<style>
.pesquisa-container, .resultados-container {
  display: flex;
  justify-content: flex-end;
  margin-top: 40px;
}

.pesquisa-wrapper, .resultados-wrapper {
  max-width: 440px;
  display: flex;
  position: relative;
}

.input-pesquisa {
  background-color: rgba(255, 255, 255, 0.2);
  background-image: url('/assets/svg/pesquisa-lupa.svg');
  background-repeat: no-repeat;
  background-position: top 16px right 16px;
  width: 440px;
  align-self: flex-end;
  border-radius: 10px;
  height: 60px;
  border: solid white 2px;
  padding: 16px;
  color: white
}

input:focus {
  outline: 0 none;
}

input:focus::placeholder {
  color: transparent !important;
}

.button-pesquisa {
  background-color: rgba(255, 255, 255, 0.2);
  width: 60px;
  height: 60px;
  border: solid white 2px;
  border-left: none;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.resultados-pesquisa {
  position: absolute;
  top: 60px;
  min-width: 440px;
  z-index: 1;
}

.resultados-pesquisa ul li a div {
  background-color: rgba(57,90,173, 0.6);
  cursor: pointer;
}

.resultados-pesquisa ul li a {
  color: white;
  text-decoration: none;
}

.resultados-pesquisa ul li a div {
  width: 100%;
  padding: 10px 16px;
}

.resultados-pesquisa ul li:hover a div {
  background-color: rgba(57,90,173, 0.8);
}

.resultados-pesquisa ul li:hover a {
  text-decoration: underline;
}

.resultados-pesquisa ul li:first-child a div {
  padding-top: 20px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.resultados-pesquisa ul li:last-child a div {
  padding-bottom: 20px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

#conteudo-principal.home.secao.topo {
  padding-top: 40px !important;
  padding-bottom: 40px !important;
}
</style>