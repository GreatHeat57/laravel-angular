/*
 * Footer menu block
 * Used in another component.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: '[angly-menuBlock]',
  templateUrl: './menuBlock.component.html',
  styleUrls: ['./menuBlock.component.scss']
})
export class MenuBlockComponent implements OnInit {

  /*
   * footerMenu is a attribute.
   * Used like this:- <div menuBlock footerMenu="variableName"></div>
   */
  @Input() footerMenu : any;

  constructor() { }

  ngOnInit() {
  }

}
