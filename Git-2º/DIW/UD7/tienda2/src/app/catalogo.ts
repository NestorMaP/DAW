import { producto  } from './producto'; 
export class catalogo { 
  constructor(private productos: producto[] = []){ 
  }
  get items(): producto[]{ 
    return this.productos; 
  } 
  get cuantos(): number{
    return this.productos.length;
  }
  addItem(nombre: string, precio: number, seccion: string){ 
    this.productos.push(new producto(nombre, precio, seccion)); 
  } 
} 