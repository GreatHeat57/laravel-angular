import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-portfolioGridV3',
  templateUrl: './portfolioGridV3.component.html',
  styleUrls: ['./portfolioGridV3.component.scss']
})
export class PortfolioGridV3Component implements OnInit {

   /* Variables */
   portfolioV3 : any;

   constructor(private service:ChkService, private pageTitleService:PageTitleService) {

      /* Page title */
      this.pageTitleService.setTitle(" Our Latest Work ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" We build something great in the world. ");

      this.service.getPortfolioV3().
         subscribe(response => {this.portfolioV3 = response},
                     err    => console.log(err),
                     ()     => this.portfolioV3
                  );
   }

   ngOnInit() {
   }

}
