const p1 = new Promise((resolve, reject) => setTimeout(() => reject('P1 Resolvida'), 4000))
const p2 = new Promise((resolve, reject) => setTimeout(() => reject('P2 Resolvida'), 2000))
const p3 = new Promise((resolve, reject) => setTimeout(() => reject('P3 Resolvida'), 3000))

let promises = [p1, p2, p3]

Promise.any(promises)
    .then(resolvida => console.log(resolvida))
        .catch(e => console.log(e))

