import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';


@Component({
  selector: 'angly-blogMasonry3',
  templateUrl: './blogMasonry3.component.html',
  styleUrls: ['./blogMasonry3.component.scss']
})
export class BlogMasonary3Component implements OnInit {

   /* Variables */
   blogMasonary3 : any;

   constructor(private pageTitleService: PageTitleService, private service:ChkService) {

      /* Page title */
      this.pageTitleService.setTitle("Blog Masonry Column 3");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Build something incredible! ");

      this.service.getBlogMasonary3().
      subscribe(response => {this.blogMasonary3 = response},
                  err => console.log(err),
                  () => this.blogMasonary3
              );
   }

   ngOnInit() {
   }

}
