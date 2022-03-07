// padStart (preenchimento à esquerda)

let codigo = '1000'
// Expectativa 0000001000
codigo = codigo.padStart(10, '0')
// console.log(codigo)

// padEnd (preenchimento à direita)
let codigo2 = '8888'
// Expectativa 8888******
codigo2 = codigo2.padEnd(10, '*')
console.log(codigo2)

