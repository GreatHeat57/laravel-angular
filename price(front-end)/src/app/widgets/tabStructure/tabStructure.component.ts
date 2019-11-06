import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-tabStructure',
  templateUrl: './tabStructure.component.html',
  styleUrls: ['./tabStructure.component.scss']
})
export class TabStructureComponent implements OnInit {

	@Input() tabsContent : any;
	
	constructor() { }

	ngOnInit() {
	}

}
