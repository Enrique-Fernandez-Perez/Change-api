import { Component, OnInit } from '@angular/core';
import { Product } from '../interface/product';
import { Shop } from '../models/shop';

@Component({
  selector: 'app-stateful',
  templateUrl: './stateful.component.html',
  styleUrls: ['./stateful.component.css']
})
export class StatefulComponent implements OnInit {

  shopModel: Shop = new Shop();
  boughtItems : Array<Product>;
  
  total:Number=0;

  constructor() {
    this.boughtItems = [];
  }
  
  ngOnInit(): void {
  }
  
  clickItem(_camiseta : any) {
    this.boughtItems.push(_camiseta);
    this.total += _camiseta.price;
    // console.log(this.boughtItems);
  }
  
  camisetaComprada(_event:Product){
    this.clickItem(_event);
  }
  
}
