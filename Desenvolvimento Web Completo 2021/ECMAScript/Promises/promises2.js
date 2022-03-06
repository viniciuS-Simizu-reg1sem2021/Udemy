const promessa = new Promise((resolve, reject) => {

    let resposta_requisicao = {}

    try {

        // throw new Error('Ooops')

        setTimeout(() => {

            resposta_requisicao = {
                0: {
                    id: 1,
                    nome: 'João'
                },
                1: {
                    id: 2,
                    nome: 'José'
                },
                2: {
                    id: 3,
                    nome: 'Maria'
                }
            }

            resolve(resposta_requisicao)
        }, 4000)


    } catch (e) {

        resposta_requisicao = {
            codigo: 1050,
            erro: 'Falha de autorização'
        }

        reject(resposta_requisicao)
    }

}).then(dados => {

    console.log(dados)

    const promessa2 = new Promise((resolve, reject) => {

        try {

            // throw new Error('Ooops')

            setTimeout(() => {

                response = {
                    0: {
                        id: 1,
                        usuario_id: 1,
                        posts: [{
                            id: 1,
                            posts: 'post1'
                        }, {
                            id: 2,
                            posts: 'post2'
                        }]
                    },
                    1: {
                        id: 2,
                        usuario_id: 2,
                        posts: [{
                            id: 1,
                            posts: 'post1'
                        }, {
                            id: 2,
                            posts: 'post2'
                        }]
                    },
                    2: {
                        id: 3,
                        usuario_id: 3,
                        posts: [{
                            id: 1,
                            posts: 'post1'
                        }, {
                            id: 2,
                            posts: 'post2'
                        }]
                    }
                }

                resolve(response)
            }, 4000)


        } catch (e) {

            response = {
                codigo: 7788,
                erro: 'Erro ao recuperar os posts dos usuários'
            }

            reject(response)
        }

    }).then(dados => {

        console.log(dados)

    }).catch(e => {
        console.log(e)
    })

}).then(param => {
    console.log('Then número 2', param)

}).then(() => {
    console.log('Then número 3')

}).then(() => {
    console.log('Then número 4')

    return 'Parâmetro capturado no catch e enviado para o Then seguinte'

}).catch(e => {
    console.log('Operação sequêncial (Catch): ', e)

    return 'Parâmetro capturado no catch e enviado para o Then seguinte'

}).then(param => {
    console.log('Then número 5', param)

}).then(() => {
    console.log('Then número 6')

})