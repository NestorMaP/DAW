import { Component, Input } from '@angular/core';
import {MatCardModule} from '@angular/material/card';
import {MatButtonModule} from '@angular/material/button';

@Component({
  selector: 'app-expediente',
  imports: [MatCardModule, MatButtonModule,],
  templateUrl: './expediente.component.html',
  styleUrl: './expediente.component.scss'
})
export class ExpedienteComponent {
  @Input () calificaciones: {id:number; modulo:string; calificacion:number;}[] = []
}
