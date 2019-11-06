import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-recentCommentsWithDate',
  templateUrl: './recentCommentsWithDate.component.html',
  styleUrls: ['./recentCommentsWithDate.component.scss']
})
export class RecentCommentsWithDateComponent implements OnInit {

	@Input() recentComments : any;
	
	constructor() { }

	ngOnInit() {
	}

}
