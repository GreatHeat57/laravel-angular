import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-tags2',
  templateUrl: './tags2.component.html',
  styleUrls: ['./tags2.component.scss']
})
export class Tags2Component implements OnInit {

	@Input() tags: any;
	
	constructor() { }

	ngOnInit() {
	}

}
