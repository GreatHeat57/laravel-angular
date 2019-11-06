import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';

@Component({
   selector: 'sidebarWidgets',
   templateUrl: './sidebarWidgets.component.html',
   styleUrls: ['./sidebarWidgets.component.scss']
})
export class sidebarWidgetsComponent implements OnInit {

   /* Variables */
   categories       : any;
   popularPosts     : any;
   socialShare      : any;
   instagramGallary : any;
   recentComments   : any;
   contactInfo      : any;
   cartInfo         : any;
   tweets           : any;
   tags             : any;
   testimonial      : any;  
   archive          : any;
   authorInfo       : any;
   tabContent       : any;


   constructor(private pageTitleService: PageTitleService, private service: ChkService) {

      /* Page title */
      this.pageTitleService.setTitle(" Sidebar Widgets ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Do you have any questions or need your help? ");
   }

   ngOnInit() {

      this.service.getcategories().
         subscribe(response => { this.categories = response },
         err => console.log(err),
         () => this.categories
         );

      this.service.getPopularPosts().
         subscribe(response => { this.popularPosts = response },
         err => console.log(err),
         () => this.popularPosts
         );

      this.service.getSocialShare().
         subscribe(response => { this.socialShare = response },
         err => console.log(err),
         () => this.socialShare
         );

      this.service.getRecentComments().
         subscribe(response => { this.recentComments = response },
         err => console.log(err),
         () => this.recentComments
         );
      
      this.service.getContactUsWidgets().
         subscribe(response => { this.contactInfo = response },
            err => console.log(err),
            () => this.contactInfo
            );

      this.service.getCart().
      subscribe(response => { this.cartInfo = response },
            err => console.log(err),
            () => this.cartInfo
            );

      this.service.getTweets().
      subscribe(response => { this.tweets = response },
            err => console.log(err),
            () => this.tweets
            );

      this.service.getInstagramImages().
         subscribe(response => { this.instagramGallary = response },
         err => console.log(err),
         () => this.instagramGallary
         );

      this.service.getTags().
         subscribe(response => { this.tags = response },
         err => console.log(err),
         () => this.tags
         );

      this.service.getTestimonial().
         subscribe(response => {this.testimonial = response},
         err      => console.log(err),
         ()       => this.testimonial
         );

      this.service.getArchive().
         subscribe(response => {this.archive = response},
         err      => console.log(err),
         ()       => this.archive
         );

      this.service.getAboutAuthor().
         subscribe(response => {this.authorInfo = response},
         err      => console.log(err),
         ()       => this.authorInfo
         );

         this.service.getTabContent().
         subscribe(response => {this.tabContent = response},
         err      => console.log(err),
         ()       => this.tabContent
         );


   }


}
