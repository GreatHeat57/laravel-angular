/*
 * Popular posts structure.
 * Used in another components.
 */
import { Component, OnInit, Input, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: 'angly-popularPosts',
  templateUrl: './popularPosts.component.html',
  styleUrls: ['./popularPosts.component.scss']
})
export class PopularPostsComponent implements OnInit {

   @Input() popularPosts : any;

   constructor() { }

   ngOnInit() {}

}
