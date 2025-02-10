import { Component, Input } from '@angular/core';
import {MatTableModule} from '@angular/material/table';
import { producto } from '../producto';

@Component({
  selector: 'app-tabla',
  imports: [MatTableModule],
  templateUrl: './tabla.component.html',
  styleUrl: './tabla.component.scss'
})
export class TablaComponent {
  @Input () productos: producto[] = [];
}
