import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-recentCommentsWithIcon',
  templateUrl: './recentCommentsWithIcon.component.html',
  styleUrls: ['./recentCommentsWithIcon.component.scss']
})
export class RecentCommentsWithIconComponent implements OnInit {

	@Input() recentComments : any;
	
	constructor() { }

	ngOnInit() {
	}

}
