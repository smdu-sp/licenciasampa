<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

// Parser para a conversão de entidades HTML
const parser = new DOMParser

const inputPesquisa = ref('')
const postsAssuntos = ref([])
const postsPorPesquisa = 8
const postsFiltroPesquisa = computed(() => {
  const postsFiltrados = []

  if (postsAssuntos.value && inputPesquisa.value?.length >= 3) {
    const consultaNormalizada = inputPesquisa.value.normalize('NFD').replace(/\p{Diacritic}/gu, '').toLocaleUpperCase('pt-BR')
    
    for (const post of postsAssuntos.value) {
      console.log(post.titulo)
      if (post.titulo.includes(consultaNormalizada) && postsFiltrados.length <= postsPorPesquisa) {
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
          post.titulo = normalizarTexto(post.title.rendered)

          postsAssuntos.value.push(post)
        }
      }
      
      for (const post of postsRaw) {
        if (post.meta.grupo && !post.meta.priorizar) {
          post.titulo = normalizarTexto(post.title.rendered)

          postsAssuntos.value.push(post)
        }
      }
    })
})

function normalizarTexto(string) {
  const dom = parser.parseFromString(string, 'text/html')
  return dom.body.textContent.normalize('NFD').replace(/\p{Diacritic}/gu, '').toLocaleUpperCase('pt-BR')
}
</script>

<template>
  <div class="pesquisa-wrapper">
    <input v-model="inputPesquisa" class="input-pesquisa" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar serviço" autocomplete="off">
    <div class="resultados-pesquisa">
    <ul id="resultados-pesquisa">
      <template v-if="inputPesquisa.length >= 3 && postsFiltroPesquisa.length > 0">
        <li v-for="post, index of postsFiltroPesquisa" :key="`titulo-${index}`">
          <a :href="post.link">
            <div v-html="post.titulo"></div>
          </a>
        </li>
      </template>
      <li class="pesquisa-sem-resultados" v-if="inputPesquisa.length >= 3 && postsFiltroPesquisa.length == 0">Não foram encontrados resultados para sua pesquisa.</li>
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

.resultados-pesquisa ul li a, .pesquisa-sem-resultados {
  color: white;
  text-decoration: none;
}

.resultados-pesquisa ul li a div, .pesquisa-sem-resultados {
  width: 100%;
  padding: 10px 16px;
}

.resultados-pesquisa ul li:hover a div, .pesquisa-sem-resultados {
  background-color: rgba(57,90,173, 0.90);
}

.resultados-pesquisa ul li:hover a {
  text-decoration: underline;
}

.resultados-pesquisa ul li:first-child a div, .pesquisa-sem-resultados {
  padding-top: 20px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.resultados-pesquisa ul li:last-child a div, .pesquisa-sem-resultados {
  padding-bottom: 20px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

#conteudo-principal.home.secao.topo {
  padding-top: 40px !important;
  padding-bottom: 40px !important;
}
</style>