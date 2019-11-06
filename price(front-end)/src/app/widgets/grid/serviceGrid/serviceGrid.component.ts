/*
 * Service grid structure
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: '[angly-serviceGrid]',
  templateUrl: './serviceGrid.component.html',
  styleUrls: ['./serviceGrid.component.scss']
})
export class ServiceGridComponent implements OnInit {

  /*
   * serviceGridContent is a attribute.
   */
  @Input() serviceGridContent:any;

  constructor() { }

  ngOnInit() {
  }

}
