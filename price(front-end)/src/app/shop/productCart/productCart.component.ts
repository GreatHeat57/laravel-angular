import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-product-cart',
  templateUrl: './productCart.component.html',
  styleUrls: ['./productCart.component.scss']
})
export class ProductCartComponent implements OnInit {

	/* Variables */
    productCart      : any;

	constructor(private pageTitleService: PageTitleService, private service:ChkService) {

	    /* Page title */
	    this.pageTitleService.setTitle(" Your Cart ");

	    /* Page subTitle */
	    this.pageTitleService.setSubTitle(" 3 Items is in your cart ");
  	}

	ngOnInit() {
	}

}
