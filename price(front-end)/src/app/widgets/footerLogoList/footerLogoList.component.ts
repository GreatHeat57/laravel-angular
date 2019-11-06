/*
 * footer logo list
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: '[angly-footerLogoList]',
  templateUrl: './footerLogoList.component.html',
  styleUrls: ['./footerLogoList.component.scss']
})
export class FooterLogoListComponent implements OnInit {

   @Input() logoList : any;

   constructor() { }

    ngOnInit() { }

    slideConfig = {	
    	"slidesToShow": 5, 
    	"slidesToScroll": 1,
    	"autoplay": true,
    	"autoplaySpeed": 2000,
    	"arrows": false,
    	responsive: [
		    {
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 4
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 3
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1
		      }
		    }
		]
   	};

    afterChange(e) {
    	//console.log('afterChange');
    }

}
