import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-testimonial2',
  templateUrl: './testimonial2.component.html',
  styleUrls: ['./testimonial2.component.scss']
})
export class Testimonial2Component implements OnInit {

	@Input() testimonial2Content : any;

	constructor() { }

	ngOnInit() {
	}

}
