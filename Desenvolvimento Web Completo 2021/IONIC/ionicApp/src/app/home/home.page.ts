import { NavController } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';

@Component({
    selector: 'app-home',
    templateUrl: 'home.page.html',
    styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {

    public pesquisa: String
    public resultado: String = ''
    public titulo: String = 'Meu primeiro app'
    public imagemRandomica: String = 'https://source.unsplash.com/random/1920x1080'

    public imagemLocal: String = '../assets/fallen.jpeg'

    constructor(private navegacao: NavController) {}

    ngOnInit() {}

    recuperar() {
        this.resultado = this.pesquisa
    }

    abrirLista() {
        this.navegacao.navigateForward('lista')
    }

    abrirBotoes() {
        this.navegacao.navigateForward('botoes')
    }

    public atualiza(): void {
        this.titulo = 'Texto alterado'
    }
    
    public acao(): void {
        this.titulo = 'Botão clicado'
    }

}
