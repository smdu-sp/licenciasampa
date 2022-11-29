<?php
/*
Template Name: TAR Aprova Rápido
*/
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div id="app" class="container">
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];

    ?>
        <!-- TABELA -->

    <?php } else { ?>

        <form action="/" method="post">
            <div class="mb-5 mt-3">
                <input type="radio" class="btn-check" name="modelo" id="modelo-1" autocomplete="off" value="1" v-model="modelo">
                <label class="btn btn-secondary me-5" for="modelo-1">Modelo 1</label>

                <input type="radio" class="btn-check" name="modelo" id="modelo-2" autocomplete="off" value="2" v-model="modelo">
                <label class="btn btn-secondary" for="modelo-2">Modelo 2</label>
            </div>

            <div class="row">
                <div class="col-12">
                    <h1>ANEXO II integrante da Instrução Normativa nº 006/SEL-G/2020</h1>
                    <p>Preencha os campos abaixo do TAR para Alvará de Aprovação de Edificação Nova</p>
                </div>
                <div v-for="secao in formulario">
                    <h2 class="mt-3">{{ secao.indice }}. {{ secao.nome }}</h2>
                    <div class="mb-3" v-for="campo, index in secao.campos">
                        <!-- Caixa de Texto -->
                        <template v-if="campo.tipo === 'subtitulo'">
                            <h3>{{ campo.indice ? campo.indice + '.' : '' }} {{ campo.label }}</h3>
                        </template>
                        <template v-if="campo.tipo === 'informativo'">
                            <p>{{ campo.indice ? campo.indice + '.' : '' }} {{ campo.label }}</p>
                        </template>
                        <template v-if="campo.tipo === 'text'">
                            <div class="row">
                                <div :class="campo.col ? 'col-' + campo.col : 'col-6'">
                                    <label :for="`${secao.htmlname}-${index}`" class="form-label">{{ campo.indice ? campo.indice + '.' : ''}} {{ campo.label }}</label>
                                    <input type="text" :name="`${secao.htmlname}-${index}`" :id="`${secao.htmlname}-${index}`" class="form-control" v-model="campo.valor">
                                </div>
                            </div>
                        </template>
                        <template v-if="campo.tipo === 'checkbox'">
                            <div class="row">
                                <div :class="campo.col ? 'col-' + campo.col : 'col-6'">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" :name="`${secao.htmlname}-${index}`" :id="`${secao.htmlname}-${index}`" v-model="campo.valor">
                                        <label :for="`${secao.htmlname}-${index}`" class="form-label">{{ campo.indice ? campo.indice + '.' : ''}} {{ campo.label }}</label>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-if="campo.tipo === 'radio'">
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-1 d-flex justify-content-center">SIM</div>
                                <div class="col-1 d-flex justify-content-center">NÃO</div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label :for="`${secao.htmlname}-${index}`" class="form-label" v-html="`${ secao.indice }.${ campo.indice }. ${ campo.label }`"></label>
                                    <ul v-if="campo.opcoes && campo.opcoes.length > 0">
                                        <template v-for="opcao1, opkey1 in campo.opcoes">
                                            <li class="form-check" v-show="modelo === '1' || campo.valor > 0">
                                                <input v-if="opcao1.tipo === 'checkbox'" class="form-check-input" type="checkbox" :name="`${secao.htmlname}-${index}-${opkey1}`" :id="`${secao.htmlname}-${index}-${opkey1}`" :disabled="typeof(campo.valor) === 'undefined' || campo.valor === 0" v-model="opcao1.valor" @change="resetarFilhos(opcao1)">
                                                <label class="form-check-label" :for="`${secao.htmlname}-${index}-${opkey1}`" class="form-label" v-html="opcao1.label"></label>
                                                <input v-if="opcao1.tipo === 'texto'" class="form-control mt-1" type="text" :name="`${secao.htmlname}-${index}-${opkey1}`" :id="`${secao.htmlname}-${index}-${opkey1}`" :disabled="typeof(campo.valor) === 'undefined' || campo.valor === 0" v-model="opcao1.valor" @change="resetarFilhos(opcao1)">
                                                <ul v-if="opcao1.opcoes && opcao1.opcoes.length > 0">
                                                    <template v-for="opcao2, opkey2 in opcao1.opcoes">
                                                        <li :class="{ 'form-check': opcao2.tipo === 'checkbox', 'form-group': opcao2.tipo === 'texto' }" v-show="modelo === '1' || opcao1.valor">
                                                            <input v-if="opcao2.tipo === 'checkbox'" class="form-check-input" type="checkbox" :name="`${secao.htmlname}-${index}-${opkey1}-${opkey2}`" :id="`${secao.htmlname}-${index}-${opkey1}-${opkey2}`" :disabled="!opcao1.valor" v-model="opcao2.valor" @change="resetarFilhos(opcao2)">
                                                            <label class="form-check-label" :for="`${secao.htmlname}-${index}-${opkey1}-${opkey2}`" class="form-label" v-html="opcao2.label"></label>
                                                            <input v-if="opcao2.tipo === 'texto'" class="form-control mt-1" type="text" :name="`${secao.htmlname}-${index}-${opkey2}`" :id="`${secao.htmlname}-${index}-${opkey2}`" :disabled="!opcao1.valor" v-model="opcao2.valor" @change="resetarFilhos(opcao2)">
                                                        </li>
                                                    </template>
                                                </ul>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                                <div class="col-1 d-flex justify-content-center">
                                    <input class="form-check-input radio-check" type="radio" :name="`${secao.htmlname}-${index}-sim`" :id="`${secao.htmlname}-${index}-sim`" :value="Number(1)" v-model="campo.valor" @change="resetarFilhos(campo)">
                                </div>
                                <div class="col-1 d-flex justify-content-center">
                                    <input class="form-check-input radio-check" type="radio" :name="`${secao.htmlname}-${index}-nao`" :id="`${secao.htmlname}-${index}-nao`" :value="Number(0)" v-model="campo.valor" @change="resetarFilhos(campo)">
                                </div>
                            </div>
                    </div>
                    </template>
                </div>
            </div>
</div>
</form>

<button class="btn-lg btn-primary mb-5" type="button" onclick="location.href='/tar-aprova-rapido-tabelas/'">Finalizar</button>
<?php } ?>

</div>

<script>
    const {
        createApp
    } = Vue;

    createApp({
        data() {
            return {
                modelo: '1',
                formulario: [{
                        indice: '1',
                        nome: 'Identificação',
                        htmlname: 'identificacao',
                        tipo: 'texto',
                        campos: [{
                                indice: '1',
                                label: 'Proprietário (ou possuidor):',
                                tipo: 'text',
                            },
                            {
                                indice: '2',
                                label: 'CPF/CNPJ:',
                                tipo: 'text',
                            },
                            {
                                indice: '3',
                                label: 'Responsável técnico pelo projeto:',
                                tipo: 'text'
                            },
                            {
                                indice: '4',
                                label: 'CREA/CAU:',
                                tipo: 'text',
                            },
                            {
                                indice: '5',
                                label: 'Endereço da obra:',
                                tipo: 'text',
                            },
                        ],
                    },
                    {
                        indice: 6,
                        nome: 'PARTICIPAÇÃO DE OUTRAS SECRETARIAS e/ou ÓRGÃOS MUNICIPAIS, ALÉM DA SEL (Em caso de \‘SIM\’, marcar a opção correspondente)',
                        htmlname: 'outras-secretarias',
                        tipo: 'alternativas',
                        campos: [
                            {
                                indice: '1.1',
                                label: 'SVMA/GTMAPP',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'Previsão de manejo arbóreo;',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: 'Presença de Área de Preservação Permanente – APP;',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: 'Curso d\’água natural a céu aberto:',
                                        tipo: 'checkbox',
                                        opcoes: [{
                                                label: 'Dentro do lote,',
                                                tipo: 'checkbox',
                                            },
                                            {
                                                label: 'Próximo ao lote.',
                                                tipo: 'checkbox',
                                            },
                                        ],
                                    },
                                    {
                                        label: 'Curso d\’água canalizado a céu aberto:',
                                        tipo: 'checkbox',
                                        opcoes: [{
                                                label: 'Dentro do lote,',
                                                tipo: 'checkbox',
                                            },
                                            {
                                                label: 'Próximo ao lote.',
                                                tipo: 'checkbox',
                                            },
                                        ],
                                    },
                                    {
                                        label: 'Outros:',
                                        tipo: 'checkbox',
                                        opcoes: [{
                                            tipo: 'texto'
                                        }],
                                    },
                                ]
                            },
                            {
                                indice: '1.2',
                                label: 'SVMA/GTAC<br>Obs. Deverá ser assinalada a interface nas seguintes hipóteses:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'Caso tenha sido apresentado documento emitido pela CETESB, ainda não avalizado pela SVMA/GTAC;',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: 'Em se tratando de imóvel INCRA, caso na Ficha Técnica/BDT conste informação de que deverá ser consultada SVMA.',
                                        tipo: 'checkbox',
                                    },
                                ],
                            },
                            {
                                indice: '2',
                                label: 'SMT/CET<br>Obs. Deverá ser assinalada a interface quando o projeto for enquadrado como Polo Gerador de Tráfego.',
                                tipo: 'radio',
                            },
                            {
                                indice: '3',
                                label: 'DPH/CONPRESP<br>Obs. Deverá ser assinalada a interface quando se tratar de imóvel em área envoltória de bem tombado cuja competência de análise, segundo Resolução de tombamento, seja de SMC.',
                                tipo: 'radio',
                            },
                            {
                                indice: '4',
                                label: 'SIURB/PROJ',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'Imóvel atingido por plano de melhoramento viário aprovado por lei posterior à data de 08/11/1988;',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: 'Imóvel objeto de faixa “non aedificandi”:',
                                        tipo: 'checkbox',
                                        opcoes: [
                                            {
                                                label: 'Córrego canalizado',
                                                tipo: 'checkbox',
                                            },
                                            {
                                                label: 'Galerias internas ao lote',
                                                tipo: 'checkbox',
                                            },
                                            {
                                                label: 'Galerias lindeiras ao lote',
                                                tipo: 'checkbox',
                                            },
                                        ],
                                    },
                                    {
                                        label: 'Outros:',
                                        tipo: 'checkbox',
                                        opcoes: [
                                            {
                                                tipo: 'texto',
                                            }
                                        ],
                                    },
                                ],
                            },
                            {
                                indice: '5',
                                label: 'DESAP (PGM)/ CGPATRI (SMG)<br>Obs. Deverá ser assinalada a interface quando, constatada uma das hipóteses deste subitem, ainda não houver parecer e/ou demarcação nas peças gráficas por SIURB/PROJ.',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'Imóvel objeto de desapropriação: incidência de desapropriação ajuizada com ou sem imissão de posse relativa a:',
                                        tipo: 'checkbox',
                                        opcoes: [
                                            {
                                                label: 'DIS',
                                                tipo: 'checkbox',
                                            },
                                            {
                                                label: 'DUP',
                                                tipo: 'checkbox',
                                            },
                                        ],
                                    },
                                ],
                            },
                        ],
                    },
                    {
                        indice: 7,
                        nome: 'PARÂMETROS E EXIGÊNCIAS BÁSICAS DO PDE, DA LOE E DA LPUOS, COM ATENDIMENTO OBRIGATÓRIO',
                        htmlname: 'exigencias-pde',
                        tipo: 'misto',
                        campos: [
                            {
                                indice: '7.1',
                                label: 'Dados gerais',
                                tipo: 'subtitulo',

                            },
                            {
                                label: 'Área do terreno',
                                tipo: 'informativo',
                            },
                            {
                                label: 'Real:',
                                tipo: 'text',
                                col: '2',
                            },
                            {
                                label: 'Escritura:',
                                tipo: 'text',
                                col: '2',
                            },
                            {
                                label: 'SQL/INCRA envolvido(s)',
                                tipo: 'text',
                            },
                            {
                                label: 'Subcategoria(s) de uso',
                                tipo: 'text',
                            },
                            {
                                label: 'Zona(s) de uso',
                                tipo: 'text',
                            },
                            {
                                indice: '7.2',
                                label: 'Índices urbanísticos e parâmetros de ocupação',
                                tipo: 'subtitulo',

                            },
                            {
                                indice: '2.1',
                                label: 'O projeto atende aos índices e parâmetros de ocupação estabelecidos:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'no Quadro 3 anexo à Lei nº 16.402/16? ou',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: 'no Quadro 2 anexo ao Decreto nº 59.885/20?',
                                        tipo: 'checkbox',
                                    },
                                ],
                            },
                            {
                                indice: '2.2',
                                label: 'O projeto se utiliza de algum benefício ou exceção relacionados aos índices e parâmetros (gabarito, supressão de recuos, uso incentivado, etc.)?<br>Em caso afirmativo, especificar abaixo:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        tipo: 'texto',
                                    },
                                ],
                            },
                            {
                                indice: '2.2',
                                label: 'O projeto se utiliza de algum benefício ou exceção relacionados aos índices e parâmetros (gabarito, supressão de recuos, uso incentivado, etc.)?<br>Em caso afirmativo, especificar abaixo:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        tipo: 'texto',
                                    },
                                ],
                            },
                            {
                                indice: '2.3',
                                label: 'Existência de vila ou via sem saída com largura inferior a 10m na quadra (Art. 64 da Lei nº 16.402/16 ou inciso II do Art. 13 do Decreto nº 59.885/20)?<br>Se ‘SIM’, observa gabarito de:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: '28,00m nas ZEU, ZEUP, ZEM e ZEMP;',
                                        tipo: 'checkbox',
                                    },
                                    {
                                        label: '15,00m nas demais zonas.',
                                        tipo: 'checkbox',
                                    },
                                ],
                            },
                            {
                                indice: '2.4',
                                label: 'Doação de área para alargamento de calçadas (Art. 67 da Lei nº 16.402/16 ou Decretos nº 59.885/20 e nº 59.886/20)?',
                                tipo: 'radio',
                            },
                            {
                                indice: '2.5',
                                label: 'Quota máxima de terreno por unidade - uso residencial (§1º do Art. 79 da Lei nº 16.050/14):<br>Para “Sim” considerar:',
                                tipo: 'radio',
                                opcoes: [
                                    {
                                        label: 'N = (CAu x AT) / (CAmáx x Q) =',
                                        tipo: 'texto',
                                    },
                                ],
                            },
                            {
                                indice: '2.6',
                                label: 'Quota ambiental (Artigos 74 a 81 e Quadro 3B da Lei nº 16.402/17 e Decreto nº 57.565/16)?',                                tipo: 'radio',
                            },
                        ],
                    },
                    // {
                    //     indice: 9,
                    //     nome: 'DECLARAÇÕES',
                    //     htmlname: 'declaracoes',
                    //     tipo: 'declaracoes',
                    //     campos: [
                    //         {
                    //             label: 'DECLARO que não existem processos em andamento para o(s) imóvel(s) em questão.',
                    //             tipo: 'checkbox',

                    //         },
                    //     ],
                    // },
                ],
            }
        },
        methods: {
            resetarFilhos(campo) {
                if (campo.opcoes && campo.opcoes.length > 0) {
                    campo.opcoes.forEach(opcao => {
                        if (opcao.opcoes && opcao.opcoes.length > 0)
                            this.resetarFilhos(opcao);
                        opcao.valor = null;
                    });
                }
            }
        }
    }).mount('#app')
</script>

<style>
    h1 {
        font-size: 24px !important
    }

    h2 {
        font-size: 18px !important
    }

    h3 {
        margin-top: 20px;
        font-size: 16px !important
    }

    .radio-check {
        border-radius: 0.25em !important;
        margin-left: 0;
    }

    .radio-check:checked {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e") !important;
    }

    ul li::marker {
        content: ''
    }

    ul li ul {
        padding-left: 0;
    }
</style>