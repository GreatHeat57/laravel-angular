/*
 * Contact
 * Used in another component.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-contact]',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  /*
   * location is a attribute.
   * used like this:- <div angly-contact location="text"></div> and
   * And like this:- <div angly-contact [location]="variableName"></div>
   */
  @Input() location : any;

  /*
   * tel is a attribute.
   * used like this:- <div angly-contact tel="text"></div>
   * And like this:- <div angly-contact [tel]="variableName"></div>
   */
  @Input() tel : any;

  /*
   * mail is a attribute.
   * used like this:- <div angly-contact mail="text"></div>
   * And like this:- <div angly-contact [mail]="variableName"></div>
   */
  @Input() mail : any;

  constructor() { }

  ngOnInit() {
  }

}
