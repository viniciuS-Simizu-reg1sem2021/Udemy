let arr = ['banana', 'maçã', 'uva']

// Existe um determinado elemento
// let retorno = arr.find(item => item == 'maçã')
// Find retorna o primeiro valor encontrado se existente ou undefined caso não exista

let retorno = arr.includes('maçã')
// Includes retorna true caso existente, ou false se inexistente

console.log(retorno)
