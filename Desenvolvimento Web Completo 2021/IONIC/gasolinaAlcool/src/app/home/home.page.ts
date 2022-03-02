import {
	Component
}

from '@angular/core';

@Component({
		selector: 'app-home',
		templateUrl: 'home.page.html',
		styleUrls: ['home.page.scss'],
	}

) export class HomePage {

	resultado: String = 'Resultado'

	precoAlcool: string
    precoGasolina: string
    
    constructor() {}

	calcular() {

		if (this.precoAlcool && this.precoGasolina) {
            
            let pAlcool = parseFloat(this.precoAlcool)
            let pGasolina = parseFloat(this.precoGasolina)

            this.resultado = pAlcool / pGasolina >= 0.7 ? 'Melhor utilizar Gasolina' : 'Melhor utilizar Álcool'

		} else {
			this.resultado = 'Preencha corretamente os campos'
		}

	}

}
