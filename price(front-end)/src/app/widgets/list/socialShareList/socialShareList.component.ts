import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
	selector: 'angly-socialShareList',
	templateUrl: './socialShareList.component.html',
	styleUrls: ['./socialShareList.component.scss']
})
export class SocialShareListComponent implements OnInit {

	/*
	 * Get the social share content 
	 */
	@Input() socialShare : any;

	constructor() { }

	ngOnInit() {
	}
}
