// false -> null, undefined, 0, ''
let v1 = 10
let v2 = undefined // false
let v3 = null // false
let v4 = 0 // false
let v5 = '' // false
let v6 = 'Fallen'
let v7 = false

// Logical nullish assignment (??=)
v1 ||= 50
v2 ||= 100
v3 ||= 200
v4 ||= 400
v5 ||= 800
v6 ||= 1600
v7 ||= 3200

console.log('V1: ' + v1)
console.log('V2: ' + v2)
console.log('V3: ' + v3)
console.log('V4: ' + v4)
console.log('V5: ' + v5)
console.log('V6: ' + v6)
console.log('V7: ' + v7)

