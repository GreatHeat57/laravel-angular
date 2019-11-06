import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'app-testimonial2',
  templateUrl: './testimonial2.component.html',
  styleUrls: ['./testimonial2.component.scss']
})
export class Testimonial2Component implements OnInit {

   /* Variables */
   testimonialV2 : any;

   constructor(private service:ChkService, private pageTitleService:PageTitleService) {

      /* Page title */
      this.pageTitleService.setTitle(" Thousands of Happy Users ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Do you have any questions or need our help? ");

      this.service.getTestimonial().
        subscribe(response => {this.testimonialV2 = response},
                  err      => console.log(err),
                  ()       => this.testimonialV2
              );
   }

   ngOnInit() {
   }


}
