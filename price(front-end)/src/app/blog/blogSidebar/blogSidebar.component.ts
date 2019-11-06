import { Component, OnInit } from '@angular/core';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-blogSidebar',
  templateUrl: './blogSidebar.component.html',
  styleUrls: ['./blogSidebar.component.scss']
})
export class BlogSidebarComponent implements OnInit {

   /* Variables */
   blogSidebar      : any;
   categories       : any;
   popularPosts     : any;
   instagramGallary : any;

   constructor(private service:ChkService) {

      this.service.getBlogSidebar().
         subscribe(response => {this.blogSidebar = response},
                  err       => console.log(err),
                  ()        => this.blogSidebar
               );

      this.service.getcategories().
         subscribe(response => {this.categories = response},
                   err      => console.log(err),
                   ()       => this.categories
               );
      this.service.getPopularPosts().
         subscribe(response => {this.popularPosts = response},
                     err    => console.log(err),
                     ()     => this.popularPosts
                  );

      this.service.getInstagramImages().
         subscribe(response => {this.instagramGallary = response},
                   err      => console.log(err),
                   ()       => this.instagramGallary
               );

   }

   ngOnInit() {
   }

}
