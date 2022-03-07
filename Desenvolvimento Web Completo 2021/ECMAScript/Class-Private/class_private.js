class Pessoa {

    #humor;

    #mensagens = [
        'Fallen Stop Blowing My Mind',
        'Green!'
    ]

    constructor(nome) {
        this.#mudarHumor()
        this.nome = nome
    }

    #mudarHumor = () => {
        this.#humor = Math.floor(Math.random() * 2)
    }

    dizerOi = () => `Olá, o meu nome é ${this.nome}`

    getHumor = () => this.#humor

    setHumor = () => this.#mudarHumor()

    getMensagem = () => this.#mensagens[this.#humor]

}

const pessoa = new Pessoa('José')
console.log(pessoa.dizerOi())

console.log(pessoa.getHumor())
console.log(pessoa.getMensagem())

pessoa.setHumor()

console.log(pessoa.getHumor())
console.log(pessoa.getMensagem())

