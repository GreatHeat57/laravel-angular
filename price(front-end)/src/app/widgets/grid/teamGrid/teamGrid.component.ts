/*
 * Team grid structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: '[angly-teamGrid]',
  templateUrl: './teamGrid.component.html',
  styleUrls: ['./teamGrid.component.scss']
})
export class TeamGridComponent implements OnInit {

  /*
   * teamGridContent is a attribute.
   */
  @Input() teamGridContent:any;

  constructor() { }

  ngOnInit() {
  }

  /*
   * Social links
   */
  socialDetails : any = [
    { icon : 'fa-facebook'},
    { icon : 'fa-twitter text-info'},
    { icon : 'fa fa-pinterest-p text-danger'},
  ]

  /*
   * Classes of social ul, li
   */
  socialsClasses : any = {ulClass:"", liClass:"", linkClass:""}

}
