let v1 = 10
let v2 // nula -> null ou undefined

// Logical nullish assignment (??=)
v1 ??= 50
v2 ??= 100

console.log(v1, v2)

// ---------------------------------

let carro = {
    marca: 'Volkswagen',
    modelo: 'Jetta'
}

carro.marca ??= 'Volkswagen'
carro.modelo ??= 'T-Corss'
carro.ano ??= '2021'

console.log(carro)

// ---------------------------------

let arr = ['uva', 'João', null, undefined, 5, []]
for(i in arr) {
    arr[i] ??= '<não informado>'
}

console.log(arr)

