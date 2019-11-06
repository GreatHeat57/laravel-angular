import { Component, OnInit, OnDestroy, ViewChild, HostListener, Inject, ElementRef, ViewEncapsulation } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';
import { Subscription } from 'rxjs';
import { Router, NavigationEnd } from '@angular/router';
declare var $ : any;

@Component({
    selector: 'angly-layout',
  	templateUrl:'./main.component.html',
  	styleUrls: ['./main.component.scss']
})
export class MainComponent implements OnInit{

	 private _router: Subscription;
	 url: string;
	 private _mediaSubscription: Subscription;
	 private _routerEventsSubscription: Subscription;
	 isHome : boolean = true;
	 isBlog : boolean = false;
	 isCommon : boolean = false;
	 fixedHeaderClass : boolean = false;
	
	/* Variables */
	headerTitle    : string;
	headerSubTitle : string;
	featuredPost   : any;

	constructor(private pageTitleService: PageTitleService, private service:ChkService, public router: Router) {
	
		/* page title.*/
			this.pageTitleService.title.subscribe((val: string) => {
			this.headerTitle = val;
		});

		/* page subTitle. */
			this.pageTitleService.subTitle.subscribe((val: string) => {
			this.headerSubTitle = val;
		});

		this.service.getFeaturedPost().
			subscribe(response => {this.featuredPost = response},
			          err    => console.log(err),
			          ()     => this.featuredPost
			       );
	}

	ngOnInit() { }
	
	@HostListener('scroll', ['$event'])
	onScroll(event) {
		  if(event.path && (event.path[0].scrollTop > 0)){
		  		this.fixedHeaderClass = true;
		  }else{
		  		this.fixedHeaderClass = false;
		  }
	}

	onActivate(e, scrollContainer) {
		scrollContainer.scrollTop = 0;
		window.scroll(0,0);
   }

   addToggleClass() {
   	$('body').toggleClass('rtl-enable');
   }

}
