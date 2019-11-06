import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-blogMasonry2',
  templateUrl: './blogMasonry2.component.html',
  styleUrls: ['./blogMasonry2.component.scss']
})
export class BlogMasonary2Component implements OnInit {

   /* Variables */
  blogMasonary2 : any;

  constructor(private pageTitleService: PageTitleService, private service:ChkService) {

      /* Page title */
      this.pageTitleService.setTitle(" Blog Masonry Column 2");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Build something incredible! ");

      this.service.getBlogMasonary2().
      subscribe(response => {this.blogMasonary2 = response},
                  err => console.log(err),
                  () => this.blogMasonary2
              );
  }

  ngOnInit() {
  }


}
