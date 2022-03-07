let dados = [
    ['nome', 'Fallen'],
    ['profissional', [
        ['site', 'https://www.fallenstore.com.br'],
        ['profissao', 'Professor']
    ]],
    ['hobbies', ['caminhar', 'nadar']],
    ['pais', 'Brasil']
]

// console.log(dados)

console.log(Object.fromEntries(dados))

// Em JavaScript, não temos suporte a arrays associativos
// Objetos: chave e valor