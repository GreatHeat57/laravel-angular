import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';

@Component({
  selector: 'angly-pricing',
  templateUrl: './pricing.component.html',
  styleUrls: ['./pricing.component.scss']
})
export class PricingComponent implements OnInit {

  /* Variables */
  pricingContent : any;

  constructor( private pageTitleService: PageTitleService, private service:ChkService ) {

    /* Page title */
    this.pageTitleService.setTitle(" Be a Design Hero ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" Our latest news and learning articles. ");

    this.service.getPricingPageContent().
      subscribe(response => {this.pricingContent = response},
               err => console.log(err),
               () => this.pricingContent
             );

   }

  ngOnInit() {  }

}
