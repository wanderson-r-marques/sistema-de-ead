function cep() {
    const cep = document.querySelector("[wm-cep]")
    cep.addEventListener("change", (e) => {
        const URL = `https://viacep.com.br/ws/${cep.value}/json/`

        fetch(URL)
            .then(data => data.json())
            .then(endereco => {
                document.querySelector("[name = 'logradouro']").value = endereco.logradouro
                document.querySelector("[name = 'bairro']").value = endereco.bairro
                document.querySelector("[name = 'cidade']").value = endereco.localidade
                document.querySelector("[name = 'estado']").value = endereco.uf
            })
            .catch((err) => {
                document.querySelector("[name = 'logradouro']").value = ''
                document.querySelector("[name = 'bairro']").value = ''
                document.querySelector("[name = 'cidade']").value = ''
                document.querySelector("[name = 'estado']").value = ''
            })
    })
}