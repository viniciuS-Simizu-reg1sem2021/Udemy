function* conversar() {
    // console.log('Comando 1')
    // console.log('Comando 2')
    // console.log('Comando 3')
    let opcao = yield 'E ai, tudo bem?'
    
    // console.log('Comando 4')
    // console.log('Comando 5')
    // console.log(opcao)

    if(opcao.toLowerCase() === 'sim') {

        yield 'Ótimo, fico feliz!'

        opcao = yield 'Como eu posso te ajudar? Quer uma piada para começar?'
        if(opcao.toLowerCase() === 'sim') {

            fetch('./piadas.json') // Assincrona
                .then(response => response.json())
                .then(piadas => {
                    
                    let idx = Math.floor(Math.random() * 10)
                    let piada = piadas[idx]

                    console.log(piada.piada)
                    setTimeout(() => {

                        console.log(piada.resposta)

                    }, 3000)
                })
                
                yield 'Digite 1 para compras, 2 para vendas ou 3 para falar com um atendente'

        } else {

            yield 'Digite 1 para compras, 2 para vendas ou 3 para falar com um atendente'

        }

    } else {

        yield 'Respire fundo e tenha paciência'

        opcao = yield 'Digite 1 para compras, 2 para vendas ou 3 para falar com um atendente'

    }

    return 'Atendimento finalizado'

    // yield 'Terceira etapa' + opcao
}

let conversa = conversar()
console.log(conversa.next())

function acao() {

    let resposta = document.getElementById('resposta').value

    iteracao = conversa.next(resposta)
    iteracao.done ? document.getElementById('root').style.display = 'none' : console.log(iteracao)

    // iteracao = conversa.next()
    // console.log(iteracao)
}
