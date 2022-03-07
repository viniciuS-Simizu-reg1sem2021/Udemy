class Carro {

    constructor(marca, modelo, ano) {
        this.marca = marca
        this.modelo = modelo
        this.ano = ano
    }

    toString() {
        return `Carro da marca ${this.marca}, modelo ${this.modelo} ano ${this.ano}`
    }

}

const carro = new Carro('Jeep', 'Renegade', 2021)

console.log(carro.toString())

