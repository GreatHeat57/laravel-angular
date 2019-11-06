import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-portfolioGridV2',
  templateUrl: './portfolioGridV2.component.html',
  styleUrls: ['./portfolioGridV2.component.scss']
})
export class PortfolioGridV2Component implements OnInit {

   /* Variables */
   portfolioV2 : any;

   constructor(private service:ChkService, private pageTitleService:PageTitleService) {

      /* Page title */
      this.pageTitleService.setTitle(" Our Latest Work ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" We build something great in the world. ");

      this.service.getPortfolioV2().
         subscribe(response => {this.portfolioV2 = response},
                     err    => console.log(err),
                     ()     => this.portfolioV2
                  );
   }

   ngOnInit() {
   }

}
