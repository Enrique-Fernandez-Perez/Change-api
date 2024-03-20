import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Product } from '../interface/product';

@Component({
selector: 'app-stateless',
templateUrl: './stateless.component.html',
styleUrls: ['./stateless.component.css']
})

export class StatelessComponent implements OnInit {
  @Input() product: Product;
  private disable : boolean;
  public compra : string;

  @Output() camisetaComprada : EventEmitter<Product> = new EventEmitter();

  constructor() {
    this.product={};
    this.disable = false;
    this.compra = "Comprar";
  }

  ngOnInit(): void {
    
  }


  isDisable(){
    return this.disable;
  }

  bought(){
    this.disable = true;
    this.compra = "¡Comprado!";
    this.camisetaComprada.emit(this.product);
  }
}
