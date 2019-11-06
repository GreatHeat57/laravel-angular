/*
 * Mobile Featured
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-mobileFeatured]',
  templateUrl: './mobileFeatured.component.html',
  styleUrls: ['./mobileFeatured.component.scss']
})
export class MobileFeaturedComponent implements OnInit {

   @Input() mobileFeatured : any;

   constructor() { }

   ngOnInit() {
   }

}
