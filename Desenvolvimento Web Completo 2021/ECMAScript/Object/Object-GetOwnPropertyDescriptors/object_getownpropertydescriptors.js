let objeto = {
    nome: 'Fallen',
    profissional: {
        site: 'https://www.fallenstore.com.br',
        profissao: 'Professor'
    },
    hobbies: [{
            id: 1,
            hobby: 'Stop blowing minds'
        },
        {
            id: 2,
            hobby: 'Gosta muito do Fer'
        }
    ],
    pais: 'Brasil'
}

// Descritores de propriesdades
// console.log(Object.getOwnPropertyDescriptors(objeto))

/*
// Descritor Writable: quando definido como false, ele indica que o valor da propriedade não podera ser modificada
Object.defineProperty(objeto, 'nome', {
    value: 'Gabriel Fallen Tôledo',
    writable: false
})
console.log(Object.getOwnPropertyDescriptors(objeto))
*/

/*
// Descritor Enumerable: quando definido como false, a propriedade em questão não é exibida em loços de repetição
Object.defineProperties(objeto, {
    'hobbies': {
        enumerable: false
    },
    'profissional': {
        enumerable: false
    }
})
for (let propriedade in objeto) {
    console.log(objeto[propriedade])
}
*/

// Descritor Configurable: quando definido como false, indica que a propriedade não pode ser deletada e também não podemos mais modificar os descritores, exceto a mudança de Writable para false
console.log(Object.getOwnPropertyDescriptors(objeto))

Object.defineProperties(objeto, {
    'pais': {
        configurable: false
    },
    'nome': {
        configurable: false
    }
})

console.log(delete objeto.pais)
console.log(Object.defineProperty(objeto, 'nome', { writable: false }))
console.log(Object.defineProperty(objeto, 'nome', { enumerable: false }))
console.log(Object.defineProperty(objeto, 'nome', { configurable: true }))
console.log(Object.getOwnPropertyDescriptors(objeto))

