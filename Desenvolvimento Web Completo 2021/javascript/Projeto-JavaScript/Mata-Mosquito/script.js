var altura = window.innerHeight
var largura = window.innerWidth
var vidas = 3
var tempo = 50

var criaMosquitoTempo = 1500

var nivel = window.location.search.replace('?', '')

if(nivel === "normal") {
    // 1500
    criaMosquitoTempo = 1500
    tempo = 50
} else if(nivel === "dificil") {
    // 1000
    criaMosquitoTempo = 1000
    tempo = 65
} else if(nivel === "mustDie") {
    // 750
    criaMosquitoTempo = 750
    tempo = 80
}

var cronometro = setInterval(function() {if(tempo <= 0) {clearInterval(cronometro); clearInterval(criaMosca); window.location.href = "vitoria.html"} else {tempo--; document.getElementById("cronometro").innerHTML = tempo}}, 1000)

function ajustaTamanhoPalcoJogo() {
    altura = window.innerHeight
    largura = window.innerWidth
}

function tamanhoAleatorio() {
    var classe = Math.floor(Math.random() * 3)

    switch(classe) {
        case 0:
            return "mosquito1"

        case 1:
            return "mosquito2"

        case 2:
            return "mosquito3"
    }
}


function ladoAleatorio() {
    var classe = Math.floor(Math.random() * 2)

    switch(classe) {
        case 0:
            return "ladoA"

        case 1:
            return "ladoB"
    }
}


function posicaoRandomica() {

    // Remover mosquito anterior (caso exista)
    if(document.getElementById("mosquito")) {
        document.getElementById("mosquito").remove()

        document.getElementById("v" + vidas).src = "imagens/coracao_vazio.png"
        vidas--
        
        if(vidas < 1) {
            window.location.href = "fim-de-jogo.html"
        }
    } 

    var posicaoX = Math.floor(Math.random() * largura) - 100
    var posicaoY = Math.floor(Math.random() * altura) - 100

    posicaoX = posicaoX < 0 ? 100 : posicaoX
    posicaoY = posicaoY < 0 ? 100 : posicaoY
    
    // Criar elementos HTML
    
    var mosquito = document.createElement("img")
    mosquito.src = "imagens/mosca.png"
    mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio()
    mosquito.style.left = posicaoX + "px"
    mosquito.style.top = posicaoY + "px"
    mosquito.style.position = "absolute"
    mosquito.id = "mosquito"
    mosquito.onclick = function() {
        this.remove()
    }
    
    document.body.appendChild(mosquito)
}


