/*
 * categories structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: 'angly-categoriesList',
  templateUrl: './categoriesList.component.html',
  styleUrls: ['./categoriesList.component.scss']
})
export class CategoriesListComponent implements OnInit {

  /*
   * categories is a attribute.
   */
  @Input() categories: any;

  constructor() { }

  ngOnInit() {
  }

}
