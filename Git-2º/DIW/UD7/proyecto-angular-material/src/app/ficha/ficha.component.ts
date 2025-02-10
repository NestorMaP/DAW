import {Component} from '@angular/core';
import {MatSidenavModule} from '@angular/material/sidenav';
import { ExpedienteComponent } from "../expediente/expediente.component";

@Component({
  selector: 'app-ficha',
  imports: [MatSidenavModule, ExpedienteComponent],
  templateUrl: './ficha.component.html',
  styleUrl: './ficha.component.scss'
})
export class FichaComponent {
  imagen="https://wallpapers.com/images/hd/bender-futurama-pictures-4ccnnakww1wfj1ik.jpg";
  nombre="Bender Bending Rodríguez";
  correo="bbr@aol.us";

  calificaciones = [
    {
      id: 1,
      modulo: "DIW",
      calificacion: 7,
    },
    {
      id: 2,
      modulo: "HDI",
      calificacion: 8
    },
  ]
}
