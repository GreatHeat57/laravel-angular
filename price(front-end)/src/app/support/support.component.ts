import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';

@Component({
  selector: 'angly-support',
  templateUrl: './support.component.html',
  styleUrls: ['./support.component.scss']
})
export class SupportComponent implements OnInit {

  /* Variables */
  supportContent : any;

  constructor(private pageTitleService: PageTitleService, private service:ChkService) {
    
    /* Page title */
    this.pageTitleService.setTitle(" Support ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" Our latest news and learning articles. ");

    this.service.getSupportContent().
      subscribe(response => {this.supportContent = response},
                err => console.log(err),
                () => this.supportContent
            );
  }

  ngOnInit() {
  }


}
