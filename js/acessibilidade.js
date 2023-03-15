function aumentarTexto() {
    if (estado <= 3) {
        estado = estado + 1;
    }
    console.log(estado);

    // Seleciona o elemento root (tag html)
    const root = document.documentElement;

    if (estado === 0) {
        root.className = '';
    }

    if (estado === 1) {
        root.className = 'tamanho-fonte-115';
    }
    if (estado === 2) {
        root.className = 'tamanho-fonte-130';
    }
    if (estado === 3) {
        root.className = 'tamanho-fonte-150';
    }
    if (estado === 4) {
        root.className = 'tamanho-fonte-180';
    }

    // document.documentElement.fontSize=tamanho+"px";

}

function diminuirTexto() {
    if(estado >= -3){
        estado = estado -1;
    }

    // Seleciona o elemento root (tag html)
    const root = document.documentElement;

    if(estado === 0){
        root.className = '';
    }

    if(estado === -1){
        root.className = 'tamanho-fonte-90';
    }
    
    if(estado === -2){
        root.className = 'tamanho-fonte-80';
    }

    if(estado === -3){
        root.className = 'tamanho-fonte-70';
    }

    if(estado === -4){
        root.className = 'tamanho-fonte-60';
    }

    // TO-DO: DIMINUIR TEXTO

    // document.documentElement.fontSize=tamanho-"px";

}

var estado = 0;

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



