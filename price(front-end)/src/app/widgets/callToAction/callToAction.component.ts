/*
 * Call to action
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-callToAction]',
  templateUrl: './callToAction.component.html',
  styleUrls: ['./callToAction.component.scss']
})
export class CallToActionComponent implements OnInit {

  /*
   * Heading is a attribute.
   * Two way used this attribute:-
   * 1. <div angly-callToAction [heading]="variableName"></div>
   * If used variableName so get the data from component.ts file.
   * 2. <div angly-callToAction heading="heading text"></div>
   */
  @Input() heading : string;

  /*
   * subHeading is a attribute.
   * Two way used this attribute:-
   * 1. <div angly-callToAction [subHeading]="variableName"></div>
   * If used variableName so get the data from component.ts file.
   * 2. <div angly-callToAction subHeading="heading text"></div>
   */
  @Input() subHeading : string;

  /*
   * buttonInfo is a attribute.
   * Format of object. Eg:- {"url":"", "title": ""}
   * Used like this:- <div angly-callToAction buttonInfo="variableName"></div>
   */
  @Input() buttonInfo : Object = {};

  constructor() { }

  ngOnInit() {
  }

}
