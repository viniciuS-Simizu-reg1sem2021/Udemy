// Testando com o operador lógico OR

const operacoes = [null, 0, undefined, '', 'Valor à esquerda']
let testes = []

for(i of operacoes) {
    testes.push(i || 'Valor à direita')
}

testes.forEach((teste, i) => {
    console.log(`Teste${i+1}: ${teste}`)
})

console.log('------------------')

for(i in testes) {
    // Nullish Coalescing (??)
    testes[i] = operacoes[i] ?? 'Valor à direita'
}

testes.forEach((teste, i) => {
    console.log(`Teste${i+1}: ${teste}`)
})



