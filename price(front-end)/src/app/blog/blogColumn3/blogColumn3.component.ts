import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-blogColumn3',
  templateUrl: './blogColumn3.component.html',
  styleUrls: ['./blogColumn3.component.scss']
})
export class BlogColumn3Component implements OnInit {

   /* Variables */
  blogColumn3 : any;

  constructor(private pageTitleService: PageTitleService, private service:ChkService) {

      /* Page title */
      this.pageTitleService.setTitle(" Latest Blog Post-3 Column ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Build something incredible! ");

      this.service.getBlogColumn3().
       subscribe(response => {this.blogColumn3 = response},
                  err => console.log(err),
                  () => this.blogColumn3
              );
  }

  ngOnInit() {
  }

}
