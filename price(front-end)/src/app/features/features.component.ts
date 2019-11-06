import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';

@Component({
  selector: 'angly-features',
  templateUrl: './features.component.html',
  styleUrls: ['./features.component.scss']
})
export class FeaturesComponent implements OnInit {

  /* Variables */
  featuresContent : any;

  constructor(private pageTitleService: PageTitleService, private service:ChkService) {

    /* Page title */
    this.pageTitleService.setTitle(" Features ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" Our latest news and learning articles. ");

    this.service.getFeaturesContent().
      subscribe(response => {this.featuresContent = response},
                err => console.log(err),
                () => this.featuresContent
            );

  }

  ngOnInit() {}

}
