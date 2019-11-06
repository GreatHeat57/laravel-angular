/*
 * Instagram gallary structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: 'angly-instagramGallary',
  templateUrl: './instagramGallary.component.html',
  styleUrls: ['./instagramGallary.component.scss']
})
export class InstagramGallaryComponent implements OnInit {

   @Input() InstagramImages : any

   constructor() { }

   ngOnInit() {
   }

}
