import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-tags1',
  templateUrl: './tags1.component.html',
  styleUrls: ['./tags1.component.scss']
})
export class Tags1Component implements OnInit {

	@Input() tags : any;

	constructor() { }

	ngOnInit() {
	}

}
