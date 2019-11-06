import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-testimonial1',
  templateUrl: './testimonial.component.html',
  styleUrls: ['./testimonial.component.scss']
})
export class TestimonialComponent implements OnInit {

	@Input() testimonialContent : any;

	constructor() { }

	ngOnInit() {
	}

}
