let processos = [1, 2, 3, 4, 5]

let iteracaoAssincrona = async () => {

    for(let processo of processos) {
    
        // Processamentos Assincronos
        await new Promise((resolve, reject) => {
            setTimeout(() => {
                console.log('Processamento assíncrono')
                resolve()
            }, 2000)
        })
    
        console.log(processo)
    }
}

iteracaoAssincrona()

