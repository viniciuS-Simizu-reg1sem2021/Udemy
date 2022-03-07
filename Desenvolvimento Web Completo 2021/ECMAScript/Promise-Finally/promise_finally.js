let p = new Promise((resolve, reject) => {

    try {

        throw new Error()
        resolve('Resolvida')

    } catch (e) {

        reject(e)

    }

})
.then(resultado => {
    console.log(resultado)
})
.catch(e => {
    console.log(e, ':(')
})
.finally(() => {
    console.log('Fluxo se rejeitado ou Resolvido')
})
.then(() => {
    console.log('Then após o Finally')
})