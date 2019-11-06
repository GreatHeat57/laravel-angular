import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';

@Component({
  selector: 'angly-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  /* Variables */
  contact : any;
  
  lat: number = 30.67995;
  lng: number = 76.72211;
  
  constructor( private pageTitleService: PageTitleService, private service:ChkService ) {

    /* Page title */
    this.pageTitleService.setTitle(" Lets Get In Touch ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" Our latest news and learning articles. ");

    this.service.getContactContent().
      subscribe(response => {this.contact = response},
                err      => console.log(err),
                ()       => this.contact
            );
  }

  ngOnInit() {
  }

}
