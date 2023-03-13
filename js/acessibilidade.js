function aumentarTexto() {
    // Seleciona o elemento root (tag html)
    const root = document.documentElement;

    // APÓS 1º CLIQUE
    root.className = 'tamanho-fonte-115';
    root.className = 'tamanho-fonte-130';
    root.className = 'tamanho-fonte-150';
    root.className = 'tamanho-fonte-180';

    // TO-DO: APÓS 2º CLIQUE EM DIANTE

    document.documentElement.fontSize=tamanho+"px";

}

function diminuirTexto() {
    // Seleciona o elemento root (tag html)
    const root = document.documentElement;

    root.className = 'tamanho-fonte-90';
    root.className = 'tamanho-fonte-80';
    root.className = 'tamanho-fonte-70';
    root.className = 'tamanho-fonte-60';

    // TO-DO: DIMINUIR TEXTO

    document.documentElement.fontSize=tamanho-"px";

}

// TO-DO: GUARDAR ESTADO DO TAMANHO DE TEXTO

/*tamanho = 11.5;
function diminuirTexto(){
    tamanho--;
    document.documentElement.fontSize=tamanho+"px";
}

function aumentarTexto(){
    tamanho--;
    document.documentElement.fontSize=tamanho+"px";
}
*/



