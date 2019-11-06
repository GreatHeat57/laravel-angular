/*
 * post grid structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: '[angly-postGrid]',
  templateUrl: './postGrid.component.html',
  styleUrls: ['./postGrid.component.scss']
})
export class PostGridComponent implements OnInit {

  /*
   * postGridContent is a attribute.
   */
  @Input() postGridContent:any;

  constructor() { }

  ngOnInit() {
  }

}
