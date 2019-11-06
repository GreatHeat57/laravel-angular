/*
 * gallary grid structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: '[angly-gallaryGrid]',
  templateUrl: './gallaryGrid.component.html',
  styleUrls: ['./gallaryGrid.component.scss']
})
export class GallaryGridComponent implements OnInit {

  /*
   * gridClass is a attribute.
   */
  @Input() gridClass:any;

  /*
   * gallaryGridContent is a attribute.
   */
  @Input() gallaryGridContent:any;

  constructor() { }

  ngOnInit() {
  }

}
