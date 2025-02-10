import { Component } from '@angular/core';
import { HeaderComponent } from './header/header.component';
import { FichaComponent } from './ficha/ficha.component';

@Component({
  selector: 'app-root',
  imports: [ HeaderComponent, FichaComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  title = 'proyecto-angular-material';
}
