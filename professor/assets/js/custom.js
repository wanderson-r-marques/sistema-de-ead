$('.carga-horaria').mask('99:99');


const selectSerie = document.querySelector("[wm-serie]")
const inputsTipo = document.querySelectorAll("[wm-tipo]")
const cxEscolas = document.querySelector("[wm-escolas]")
const cxTurmas = document.querySelector("[wm-turmas]")
const cxMateriais = document.querySelector("[wm-materiais]")
const modo = document.querySelectorAll("[wm-modo]")

selectSerie.addEventListener("change", () => {
    puxaEscolas(selectSerie.value)
})

cxEscolas.addEventListener("change", () => {
    let inputEscolas = document.querySelectorAll("[wm-inputEscolas]")
    let arrayEscolas = ''
    inputEscolas.forEach(input => {
        if (input.checked) {
            arrayEscolas += input.value + ','
        }

    })
    puxaTurmas(arrayEscolas.slice(0, -1))
})


function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
}

function puxaEscolas(pkSerie) {
    $.post("tarefas-escolas-request.php", {
        pkSerie: pkSerie
    }, function (data) {
        cxEscolas.innerHTML = data
    })
}

function puxaTurmas(arrayEscolas) {
    $.post("tarefas-turmas-request.php", {
        pkSerie: selectSerie.value,
        arrayEscolas: arrayEscolas
    }, function (data) {
        cxTurmas.innerHTML = data
        cxMateriais.classList.remove("d-none")
        document.querySelector('[wm-btnAdd]').classList.remove("d-none")
    })
}

inputsTipo.forEach(input => {
    input.addEventListener("change", (e) => {

    })
})

modo.forEach(m => {
    m.addEventListener("change", (e) => {
        const input = e.currentTarget.parentNode.nextElementSibling.children[1]
        const id = input.id
        if (e.target.value == 'arquivo') {
            input.type = 'file'
            input.name = 'arquivo[' + id + ']'
        } else {
            input.type = 'text'
            input.name = 'link[' + id + ']'
        }

    });
});

$('#side-menu').metisMenu();

// Course Expire and Start Daterange Script
$(function () {
    $('input[name="edu-expire"]').daterangepicker({
        singleDatePicker: true,
    });
    $('input[name="edu-expire"]').val('');
    $('input[name="edu-expire"]').attr("placeholder", "Course Expire");
});

$(function () {
    $('input[name="edu-start"]').daterangepicker({
        singleDatePicker: true,

    });
    $('input[name="start"]').val('');
    $('input[name="start"]').attr("placeholder", "Course Start");
});

function clonarArquivo() {
    const cxArquivo = document.querySelector("[wm-cxArquivo]")
    const ultimoElemento = document.querySelector("[wm-cxArquivo]").lastElementChild
    const ordem = parseInt(ultimoElemento.getAttribute("wm-ordem")) + 1

    const cloneElemento = ultimoElemento.cloneNode(true)
    cloneElemento.setAttribute("wm-ordem", ordem)
    cloneElemento.querySelector("[wm-titulo]").setAttribute("name", `titulo[${ordem}]`)
    cloneElemento.querySelector("[wm-tipo]").setAttribute("name", `tipo[${ordem}]`)
    cloneElemento.querySelector("[wm-carga]").setAttribute("name", `carga[${ordem}]`)
    cloneElemento.querySelector("[wm-modo]").setAttribute("name", `modo[${ordem}]`)
    cloneElemento.querySelector("[wm-link]").setAttribute("name", `link[${ordem}]`)
    cloneElemento.querySelector("[wm-labelTitulo]").innerHTML = `<b>Título ${ordem}</b>`

    cxArquivo.appendChild(cloneElemento)
}