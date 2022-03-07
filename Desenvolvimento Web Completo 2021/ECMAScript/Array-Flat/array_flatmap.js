let nomes = [
    'João,José,Maria',
    'Sandra,Paula',
    'Antônia,Fernanda,Marcos'
]

console.log(nomes)

let nomesMap = nomes.map(item => {
    return item.split(',')
})

console.log(nomesMap)

let nomesFlatMap = nomes.flatMap(item => {
    return item.split(',')
})

console.log(nomesFlatMap)

for(let nome of nomesFlatMap) {
    console.log(nome)
}
