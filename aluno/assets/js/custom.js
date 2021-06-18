$('.carga-horaria').mask('99:99');




const descricao = document.querySelectorAll("[wm-descricao]")
const arquivo = document.querySelectorAll("[wm-arquivo]")


function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
}

function clonarArquivo() {
    const cxArquivo = document.querySelector("[wm-cxArquivo]")
    const ultimoElemento = document.querySelector("[wm-cxArquivo]").lastElementChild
    const ordem = parseInt(ultimoElemento.getAttribute("wm-ordem")) + 1
    console.log(ultimoElemento);
    const cloneElemento = ultimoElemento.cloneNode(true)
    cloneElemento.setAttribute("wm-ordem", ordem)
    cloneElemento.querySelector("[wm-descricao]").setAttribute("name", `descricao[${ordem}]`)
    cloneElemento.querySelector("[wm-arquivo]").setAttribute("name", `arquivo[${ordem}]`)
    cloneElemento.querySelector("[wm-labelDescricao]").innerHTML = `Descrição ${ordem}`
    cloneElemento.querySelector("[wm-labelArquivo]").innerHTML = `Arquivo ${ordem}`

    cxArquivo.appendChild(cloneElemento)
}