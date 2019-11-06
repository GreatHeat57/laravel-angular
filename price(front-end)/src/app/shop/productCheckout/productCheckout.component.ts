import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-product-checkout',
  templateUrl: './productCheckout.component.html',
  styleUrls: ['./productCheckout.component.scss']
})
export class ProductCheckoutComponent implements OnInit {
	/* Variables */
    productCheckout      : any;

	constructor(private pageTitleService: PageTitleService, private service:ChkService) { 
	/* Page title */
    this.pageTitleService.setTitle(" Happy Shopping ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" 25% Off and Free global delivery for all products ");}

	ngOnInit() {
	}

}
