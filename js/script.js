const retornaAlerta = (classe, mensagem) => {
    return `                
        <div class="alert alert-${classe}" role="alert">
            ${mensagem}
        </div>
    `
}

const criarFormData = (campos) => {
    return campos.reduce((all, curr) => {
        all.append(curr.campo, curr.dado)
        return all
    }, new FormData())
}

const httpRequest = (chamada, formData, tipo) => {
    return new Promise((resolve, reject) => {
        const request = new XMLHttpRequest()

        request.onreadystatechange = function() { 
            if (request.readyState === 4) {  
                if (request.status === 200) {
                    const json = JSON.parse(request.responseText)
                    resolve(json)
                }
            } 
        }

        request.open(tipo, chamada, true)

        if (tipo === 'GET' || tipo === 'get') {
            request.send(null)
        } else if (tipo === 'POST' || tipo === 'post') {
            request.send(formData)
        }

    })
}