import { ToDoItem } from "./ToDoItem"
export class ToDoList {
  constructor(public user: string, private toDoItems: ToDoItem[] = []) {}

  get items(): readonly ToDoItem[]{
    return this.toDoItems;
  }
  addItem(task: string){
    this.toDoItems.push(new ToDoItem(task));
  }
}
