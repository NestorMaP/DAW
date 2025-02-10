import { Component } from '@angular/core';
import { ToDoList } from './ToDoList'; // No hace falta ponerlo en imports porque son clases y no componentes
import { ToDoItem } from './ToDoItem';

// Imports Material
import { MatButtonModule } from '@angular/material/button';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatIconModule } from '@angular/material/icon';
import { MatBadgeModule } from '@angular/material/badge';
import { MatTableModule  } from '@angular/material/table';
import { MatCheckboxModule  } from '@angular/material/checkbox';
import { MatFormFieldModule   } from '@angular/material/form-field';
import { MatInputModule   } from '@angular/material/input';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-root',
  imports: [ MatBadgeModule, MatButtonModule, MatToolbarModule, MatIconModule, MatTableModule, MatCheckboxModule, MatFormFieldModule, MatInputModule, MatSlideToggleModule, FormsModule,],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  private list = new ToDoList("Homer Simpson", [
    new ToDoItem("Drink some beer", true),
    new ToDoItem("Have another beer"),
    new ToDoItem("Go at Moe's"),
  ]);

  get username():string {
    return this.list.user;
  }

  get itemCount(): number {
    return this.list.items.filter(item => !item.complete).length;
  }

  get items(): readonly ToDoItem[] {
    return this.list.items.filter(item => !item.complete);
  }

  addItem(newItem: string) {
    this.list.addItem(newItem);
  }
}
