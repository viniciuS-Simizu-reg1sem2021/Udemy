$(document).ready(() => {
	
    $('#documentacao').on('click', () => {
        // $('#pagina').load('documentacao.html')
        // $.get('documentacao.html', data => {
        //     $('#pagina').html(data)
        // })
        $.post('documentacao.html', data => {
            $('#pagina').html(data)
        })
    })
    
    $('#suporte').on('click', () => {
        // $('#pagina').load('suporte.html')
        // $.get('suporte.html', data => {
        //     $('#pagina').html(data)
        // })
        $.post('suporte.html', data => {
            $('#pagina').html(data)
        })
    })


    $('#competencia').on('change', e => {
        $.ajax({
            type: 'GET',
            url: 'app.php',
            data: `competencia=${$(e.target).val()}`,
            dataType: 'json',
            success: dados => {
                $('#numeroVendas').text(dados.numVendas)
                $('#totalVendas').text(dados.totalVendas)
                $("#clientesAtivos").text(dados.clientesAtivos);
                $("#clientesInativos").text(dados.clientesInativos);
                $("#reclamacoes").text(dados.reclamacoes);
                $('#elogios').text(dados.elogios)
                $("#totalSugestoes").text(dados.sugestoes);
                $("#totalDespesas").text(dados.totalDespesas);
            },
            error: e => {console.log('Erro: ' + e)}
        })
    })
})