import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-testimonial1',
  templateUrl: './testimonial1.component.html',
  styleUrls: ['./testimonial1.component.scss']
})
export class Testimonial1Component implements OnInit {

   /* Variables */
   testimonialV1 : any;

   constructor(private service:ChkService, private pageTitleService:PageTitleService) {

      /* Page title */
      this.pageTitleService.setTitle(" Thousands of Happy Users ");

      /* Page subTitle */
      this.pageTitleService.setSubTitle(" Do you have any questions or need our help? ");

      this.service.getTestimonial().
        subscribe(response => {this.testimonialV1 = response},
                  err      => console.log(err),
                  ()       => this.testimonialV1
              );
   }

   ngOnInit() {
   }

}
