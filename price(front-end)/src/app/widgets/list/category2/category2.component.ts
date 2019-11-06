import { Component, OnInit, Input} from '@angular/core';

@Component({
  selector: 'angly-category2',
  templateUrl: './category2.component.html',
  styleUrls: ['./category2.component.scss']
})

export class Category2Component implements OnInit {

	@Input() categories : any;

	constructor() { }

	ngOnInit() {
	}

}
