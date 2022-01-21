class BD {

    constructor() {
        let id = localStorage.getItem('id')

        if (id === null) {
            localStorage.setItem('id', 0)
        }
    }


    getProximoId() {
        let proximoId = parseInt(localStorage.getItem('id')) + 1
        return proximoId
    }


    gravar(despesa) {
        let id = localStorage.getItem('id')

        console.log(id)

        localStorage.setItem(id, JSON.stringify(despesa))

        id = this.getProximoId()

        localStorage.setItem('id', id)
    }

    recuperarTodosRegistros() {
        let id = localStorage.getItem('id')
        let despesas = []

        for (let i = 0; i < id; i++) {
            let despesa = JSON.parse(localStorage.getItem(i)) // Recupera Despesa
            if (despesa === null) { // Verifica se existe o indice do Objeto no localStorage
                continue
            }
            despesa.id = i
            despesas.push(despesa)
        }

        return despesas
    }

    pesquisar(pesquisa) {
        let listaDespesas = this.recuperarTodosRegistros()
        let{ano: pAno, mes: pMes, dia: pDia, tipo: pTipo, descricao: pDescricao, valor: pValor} = pesquisa
        
        if(pesquisa.ano != '') {
            listaDespesas = listaDespesas.filter(d => d.ano == pAno)
        }

        if(pesquisa.mes != '') {
            listaDespesas = listaDespesas.filter(d => d.mes == pMes)
        }
        
        if(pesquisa.dia != '') {
            listaDespesas = listaDespesas.filter(d => d.dia == pDia)
        }

        if(pesquisa.tipo != '') {
            listaDespesas = listaDespesas.filter(d => d.tipo == pTipo)
        }
        
        if(pesquisa.descricao != '') {
            listaDespesas = listaDespesas.filter(d => d.descricao == pDescricao)
        }

        if(pesquisa.valor != '') {
            listaDespesas = listaDespesas.filter(d => d.valor == pValor)
        }

        return listaDespesas
    }

    excluirRegistro(idRegistro) {
        localStorage.removeItem(idRegistro)
    }
}

let bd = new BD()

let DespesaFactory = (ano, mes, dia, tipo, descricao, valor) => {
    return {
        ano,
        mes,
        dia,
        tipo,
        descricao,
        valor,
        validarDados() {
            for (let i in this) {
                if (this[i] === undefined || this[i] === null || this[i] === '') {
                    return false
                }
            }
            return true
        }
    }
}


let cadastraDespesa = (ano, mes, dia, tipo, descricao, valor) => {

    let model = [] // 0: tituloConteudo; 1: tituloEstilo; 2: conteudo; 3: botaoConteudo; 4: botaoEstilo

    let despesa = DespesaFactory(ano.value, mes.value, dia.value, tipo.value, descricao.value, valor.value)
    console.log(despesa)
    if (despesa.validarDados()) {
        bd.gravar(despesa)

        conteudo = ["Registro Inserido com SUCESSO", "modal-header text-success", "Dispesa cadastrada com sucesso", "Voltar", "btn btn-success"]
        model.push(...conteudo)

        ano.value = ''
        mes.value = ''
        dia.value = ''
        tipo.value = ''
        descricao.value = ''
        valor.value = ''

    } else {
        conteudo = ["Erro na Gravação", "modal-header text-danger", "Existem campos OBRIGATORIOS que não foram preenchidos", "Voltar e Corrigir", "btn btn-danger"]
        model.push(...conteudo)

    }
    document.getElementById('tituloModal').innerHTML = model[0]
    document.getElementById('modalTituloDiv').className = model[1]

    document.getElementById('conteudoModal').innerHTML = model[2]

    document.getElementById('botaoModal').innerHTML = model[3]
    document.getElementById('botaoModal').className = model[4]
    $('#gravacao').modal('show')
}


function carregaListaDespesas(despesas = [], filtro = false) {

    if(despesas.length == 0 && filtro == false) {
        despesas = bd.recuperarTodosRegistros()
    }

    let listaDespesas = document.getElementById('listaDespesas') // Seleciona o elemento HTML <tbody>
    listaDespesas.innerHTML = ''

    let categoria = { // Dicionario da categoria TIPO
        1: "Alimentação",
        2: "Educação",
        3: "Lazer",
        4: "Saúde",
        5: "Transporte"
    }

    despesas.forEach(despesa => {
        let {
            ano,
            mes,
            dia,
            tipo,
            descricao,
            valor
        } = despesa

        let linha = listaDespesas.insertRow() // Cria linha(tr)

        // Cria coluna(td)
        linha.insertCell(0).innerHTML = `${ano}/${mes}/${dia}`
        linha.insertCell(1).innerHTML = categoria[tipo]
        linha.insertCell(2).innerHTML = descricao
        linha.insertCell(3).innerHTML = valor

        // Botão EXCLUSÃO
        let btn = document.createElement('button')
        btn.className = 'btn btn-danger'
        btn.innerHTML = '<i class="fas fa-times"></i>'
        btn.id = `idDespesa${despesa.id}`
        btn.onclick = function() {
            let id = this.id.replace('idDespesa', '')
            bd.excluirRegistro(id)
            carregaListaDespesas()
        }
        linha.insertCell(4).append(btn)
    })
}

pesquisarDespesas = (ano, mes, dia, tipo, descricao, valor) => {

    let pesquisa = DespesaFactory(ano, mes, dia, tipo, descricao, valor)

    let listaDespesasFiltradas = bd.pesquisar(pesquisa)
    

    carregaListaDespesas(listaDespesasFiltradas, true)
    
    if(ano === '' && mes === '' && dia === '' && tipo === '' && descricao === '' && valor === '') {
        document.getElementById('tituloModal').innerHTML = 'Erro na Pesquisa'
    
        document.getElementById('conteudoModal').innerHTML = 'Nenhum dado foi informado'
    
        document.getElementById('botaoModal').innerHTML = 'Preencher dados'
        $('#pesquisa').modal('show')
    }

}
