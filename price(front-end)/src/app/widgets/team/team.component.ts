import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: '[angly-team]',
  templateUrl: './team.component.html',
  styleUrls: ['./team.component.scss']
})
export class TeamComponent implements OnInit {

  /*
   * team is a attribute.
   */
  @Input() team : any;

  /*
   * route is a attribute.
   * This is get the page url.
   */
  @Input() route : any;

  constructor(private router: Router) {
  }

  ngOnInit() {
  }

  /*
   * Socail media information.
   */
  socialDetails : any = [
    { url: 'https://www.facebook.com/', icon : 'icon-social-facebook'},
    { url: '', icon : 'icon-social-twitter'},
    { url: '', icon : 'icon-social-google'},
    { url: '', icon : 'icon-social-linkedin'},
    { url: '', icon : 'icon-social-instagram'}
  ]

  socialsClasses : any = {ulClass:"mb-0", liClass:"", linkClass:"nav-link"}

}
