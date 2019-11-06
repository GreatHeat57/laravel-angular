import { Component, OnInit } from '@angular/core';
import { ChkService } from '../../service/chk.service';

@Component({
  selector: 'angly-blogNoSidebar',
  templateUrl: './blogNoSidebar.component.html',
  styleUrls: ['./blogNoSidebar.component.scss']
})

export class BlogNoSidebarComponent implements OnInit {

   /* Variables */
   blogNoSidebar : any;

   constructor(private service:ChkService) {

      this.service.getBlogNoSideBar().
         subscribe(response => {this.blogNoSidebar = response},
                  err       => console.log(err),
                  ()        => this.blogNoSidebar
               );
   }

   ngOnInit() {
   }

}
