// Array
/** 
    let frutas = ["Abacaxi", "Uva", "Pera", "Mamão"]

    let [a, b, , c] = frutas

    let [a, b='Abacate', c, d, e='Banana'] = frutas   // Valor DEFAULT
*/ 

// ---------------------------------------------------------------------

/**
// Array Multi-Dimensional

let coisas = [["Abacaxi", "Uva", "Pera", "Mamão"], ['José', 'Maria']]
let [, [, a]] = coisas
*/

// ---------------------------------------------------------------------


/**
// Objeto
let Produto = {     // Composição   // é um
    descricao: 'Notebook',
    preco: 1800,
    detalhes: {     // tem um
        fabricante: 'abc',
        modelo: 'xyz'
    }
}

// Token
// Array => []
// Objeto => {}

//let {descricao, preco} = Produto
//let {descricao: d, preco: p} = Produto
//let {descricao: d, preco: p = 1000, desconto = 5} = Produto
let {detalhes: {fabricante: f = 'Tesla', modelo = 'Não informado'}} = Produto

console.log(f, modelo)
*/

// ---------------------------------------------------------------------

/**
// --------- Funções

// Array
let arr = [10, 20, 30, 40]

function teste([a, b, , c, d=100]) {
    console.log(a, b, c, d)
}

teste(arr)


// Objeto
let obj = {
    a: 10,
    b: 20,
    c: 30,
    d: 40
}

function test({a: alpha, b, d, e: eco=100}) {
    console.log(alpha, b, d, eco)
}

test(obj)
*/

// ---------------------------------------------------------------------

/**
// Array
let arr = [10, 20, 30, 40]

let[a, ...resto] = arr

console.log(a, resto)
*/
let obj = {
    a: 10,
    b: 20,
    c: 30,
    d:40
}

let{a, ...z} = obj

console.log(a, z)
