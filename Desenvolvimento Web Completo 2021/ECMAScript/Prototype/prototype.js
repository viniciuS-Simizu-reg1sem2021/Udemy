/*
// Objeto Literal
let aA = {
    cor: "Branco",
    modelo: "Airbus a380",
    levantarVoo() {console.log("Levantar Voo")}
}


// Função Construtura
let AviaoB = function(cor, modelo) {
    this.cor = cor,
    this.modelo = modelo,
    this.levantarVoo = function() {console.log("Levantar Voo")}
}


// Classe
class AviaoC {
    
    constructor(cor, modelo) {
        this.cor = cor
        this.modelo = modelo
    }

    levantarVoo() {
        console.log("Levantar Voo")
    }
}

let aB = new AviaoB("Preto", "Gol")

let aC = new AviaoC("Branco", "Mike Airline")

console.log(aA)
console.log(aB)
console.log(aC)
*/


// ---------> Herança Prototype Chain
// ---------> Objeto Literal

Object.prototype.atributo50 = "z"   // Cuidado: Atributos e Metodos GLOBAIS

let animal = {
    atributo1: "a"
}
let vertebrado = {
    __proto__: animal,
    atributo2: "b"
}
let ave = {
    __proto__: vertebrado,
    atributo2: "B",
    atributo3: "c"
}

console.log(ave.atributo1, ave.atributo2, ave.atributo3, ave.atributo50)
