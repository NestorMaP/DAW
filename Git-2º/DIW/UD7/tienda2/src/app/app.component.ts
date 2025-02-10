import { Component, ViewChild } from '@angular/core';
import { catalogo } from './catalogo';
import { producto } from './producto';
import { ContadorComponent } from './contador/contador.component';
import { TablaComponent } from './tabla/tabla.component';
import {MatStepperModule} from '@angular/material/stepper';

/*import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';*/
import { FormsModule } from '@angular/forms'
import { MatButtonModule } from '@angular/material/button';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatIconModule } from '@angular/material/icon';
import { MatBadgeModule } from '@angular/material/badge';
import { MatTableModule  } from '@angular/material/table';
import { MatCheckboxModule  } from '@angular/material/checkbox';
import { MatFormFieldModule   } from '@angular/material/form-field';
import { MatInputModule   } from '@angular/material/input';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';
import { MatSelectModule } from '@angular/material/select';





@Component({
  selector: 'app-root',
  imports: [FormsModule, MatButtonModule, MatToolbarModule, MatIconModule, MatBadgeModule, MatTableModule, MatCheckboxModule,
    MatFormFieldModule, MatInputModule, MatSlideToggleModule, MatSelectModule, ContadorComponent, TablaComponent,],

  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})

export class AppComponent{

  lista_categorias = ['Senderismo', 'Running', 'Ciclismo', 'Natación', 'Acuáticos'];

  private listado = new catalogo([
    new producto("Asics Predator", 124.99),
    new producto("Kayak Sevylor", 500),
    new producto("Orbea 750", 1550),
  ]);

  get itemCount(): number {
    return this.listado.cuantos;
  }

  mostrarSinCategoria: boolean=false;

  get items(): producto[] {
    if (!this.mostrarSinCategoria){
      return this.listado.items.filter(item => item.precio!=0);
    }else{
      return this.listado.items.filter(item => item.seccion === "No asignada");
    }

  }

  addItem(newItem: string, precio: string, seccion: string) {

    if (newItem != "") {

        this.listado.addItem(newItem, Number(precio), seccion)

    }

}



}


