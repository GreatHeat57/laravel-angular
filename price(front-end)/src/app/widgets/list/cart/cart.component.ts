import { Component, OnInit,Input } from '@angular/core';

@Component({
  selector: 'angly-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.scss']
})
export class CartComponent implements OnInit {

   @Input() cart : any;

   constructor() { }

   ngOnInit() {
   }

}
