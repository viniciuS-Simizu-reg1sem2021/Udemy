// import { saudacao, getEnderecoByCEP } from './import/lib.mjs'

/*
console.log(saudacao())

getEnderecoByCEP('25520171').then(dados => { console.log(dados) })
*/

document.querySelector('#btnSaudacao').addEventListener('click', async () => {
    let modulo = await import('./import/lib.mjs') // Async Await
    console.log(modulo.saudacao())
})

document.getElementById('cep').addEventListener('keyup', e => {
    if (e.key === 'Enter') {
        let cep = e.target.value
        if (cep.length === 8) {

            import('./import/lib2.mjs') // Promise
                .then(module => module.getEnderecoByCEP(cep)
                    .then(dados => console.log(dados)))



        }
    }
})