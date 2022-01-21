// Contexto SPREAD

// -------------- String
let tituloArtigo = "Como utilizar o operador Rest/Spread"

/**
console.log(tituloArtigo)
console.log(...tituloArtigo)
console.log([...tituloArtigo])
*/


// -------------- Arrays
let listaCursos1 = ["NodeJS e MongoDB", "ES6, TypeScript e Angular 4"]
let listaCursos2 = ["Multiplataforma Android/IOS", "Introdução ao GNU/Linux"]
let listaCursosCompleto = ["Web Completo", "Android Completo", ...listaCursos1, ...listaCursos2]

// console.log(listaCursosCompleto)


// -------------- Objetos
let Pessoa = {
    nome: "João",
    idade: 27,
    dizerOi() {console.log("Oi")}
}

let Clone = {
    endereco: "Rua ABC",
    ...Pessoa
}

/**
console.log(Clone)
Clone.dizerOi()
*/



// Contexto REST
/**
soma = (...param) => {
    let resultado = 0

    console.log(param)
    
    param.forEach(v => resultado += v)

    return resultado
}

console.log(soma(3, 8, 5, 7, -8, 10, 115))
*/

function multiplicador(m, ...p) {
    let resultados = []
    let soma = 0

    p.forEach(v => resultados.push(m*v))
    resultados.forEach(v => soma += v)

    return [resultados, soma]
}

console.log(multiplicador(2, 1, 2, 3, 4, 5))
