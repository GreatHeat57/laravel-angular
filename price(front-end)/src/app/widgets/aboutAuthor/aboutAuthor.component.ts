import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-aboutAuthor',
  templateUrl: './aboutAuthor.component.html',
  styleUrls: ['./aboutAuthor.component.scss']
})
export class AboutAuthorComponent implements OnInit {

	@Input() aboutAuthor : any;

	constructor() { }

	ngOnInit() {
	}

	/*
	 * Social links
	 */
	socialDetails : any = [
	 { url: 'https://www.facebook.com/', icon : 'fa-facebook'},
	 { url: '', icon : 'fa-twitter text-info'},
	 { url: '', icon : 'fa-pinterest text-danger'},
	]

	/*
	 * Classes of social ul, li
	 */
	socialsClasses : any = {ulClass:"", liClass:"", linkClass:""}

}
