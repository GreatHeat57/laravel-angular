import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'angly-socialTags',
  templateUrl: './socialTags.component.html',
  styleUrls: ['./socialTags.component.scss']
})
export class SocialTagsComponent implements OnInit {

	@Input() Socials : any;

	constructor() { }

	ngOnInit() {
	}

}
