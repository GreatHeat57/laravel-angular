import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-productlist',
  templateUrl: './productlist.component.html',
  styleUrls: ['./productlist.component.scss']
})
export class ProductlistComponent implements OnInit {

	/* Variables */
    productlist      : any;
    categories       : any;
   	popularPosts     : any;
   	productsList     : any;

    constructor(private pageTitleService: PageTitleService, private service:ChkService) {

	    /* Page title */
	    this.pageTitleService.setTitle(" Happy Shopping ");

	    /* Page subTitle */
	    this.pageTitleService.setSubTitle(" 25% Off and Free global delivery for all products ");

		this.service.getcategories().
			subscribe(response => {this.categories = response},
				err      => console.log(err),
				()       => this.categories
			);
		this.service.getPopularPosts().
			subscribe(response => {this.popularPosts = response},
				err    => console.log(err),
				()     => this.popularPosts
			);

		this.service.getProductsList().
			subscribe(response => {this.productsList = response},
				err    => console.log(err),
				()     => this.productsList
			);
  	}

  ngOnInit() {
  }

}
