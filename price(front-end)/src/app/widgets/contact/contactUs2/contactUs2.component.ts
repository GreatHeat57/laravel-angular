import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-contactUs2',
  templateUrl: './contactUs2.component.html',
  styleUrls: ['./contactUs2.component.scss']
})
export class ContactUs2Component implements OnInit {

	@Input() contact : any;
	lat: number = 30.67995;
	lng: number = 76.72211;

	constructor() { }

	ngOnInit() {
	}

}
