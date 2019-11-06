import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-testimonial]',
  templateUrl: './testimonialSlider.component.html',
  styleUrls: ['./testimonialSlider.component.scss']
})
export class testimonialSliderComponent implements OnInit {

   @Input() testimonialContent : any;
   constructor() {

   }

   ngOnInit() {
   }

}
