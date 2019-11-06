import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'angly-contactUsList',
  templateUrl: './contactUsList.component.html',
  styleUrls: ['./contactUsList.component.scss']
})
export class ContactUsListComponent implements OnInit {

   @Input() contact : any;
   
   constructor() { }

   ngOnInit() {
   }


}
