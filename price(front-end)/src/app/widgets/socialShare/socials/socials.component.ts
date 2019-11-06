import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-socials]',
  templateUrl: './socials.component.html',
  styleUrls: ['./socials.component.scss']
})
export class SocialsComponent implements OnInit {

   /*
    * socails is a attribute.
    * Format for array ob object is:-[{ url: 'https://www.facebook.com/', icon : 'icon-social-facebook'}]
    */
   @Input() socials : any;

   @Input() socialsClasses : any;

  constructor() { }

  ngOnInit() {
  }

}
