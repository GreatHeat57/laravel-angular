import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-product-detail',
  templateUrl: './productDetail.component.html',
  styleUrls: ['./productDetail.component.scss']
})
export class ProductDetailComponent implements OnInit {
	/* Variables */
	productdeatil    : any;
	relatedProducts  : any;

	constructor(private pageTitleService: PageTitleService, private service:ChkService) {
		/* Page title */
	    this.pageTitleService.setTitle(" Product Detail ");

	    /* Page subTitle */
	    this.pageTitleService.setSubTitle(" 25% Off and Free global delivery for all products ");


		this.service.getRelatedProducts().
			subscribe(response => {this.relatedProducts = response},
				err    => console.log(err),
				()     => this.relatedProducts
			);
	}

	ngOnInit() {
	}
}
