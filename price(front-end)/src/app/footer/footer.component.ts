import { Component, Inject, OnInit, HostListener } from '@angular/core';
import { MenuItems } from '../core/menu/menu-items/menu-items';
import { Router } from '@angular/router';

declare var $ : any;

@Component({
  selector: '[angly-footer]',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  /* Variables */
  footerCompanyMenu : any;
  footerExploreMenu : any;

  constructor(public menuItems: MenuItems, public router: Router) { }

  ngOnInit() {

    /* Footer menu's */
    this.footerCompanyMenu = this.menuItems.getFooterMenu();
    this.footerExploreMenu = this.menuItems.getExploreMenu()

    window.addEventListener('scroll', this.scroll, true);
    $("#back-top").hide();
  }

  scroll() {
    if (document.body.scrollTop > 300){
        $('#back-top').fadeIn(0);
    } else {
        $('#back-top').fadeOut(0);
    }
  }


  topScroll(e)
  {
    e.preventDefault();
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
            return false;
  }

  /*
   * Object of call to action button.
   */
  buttonDetails = { url:'pricing', title:'Get Started Today!'}
  

  /*
   * Socail media information.
   */
  socialDetails : any = [
    { url: '', icon : 'fa fa-facebook'},
    { url: '', icon : 'fa fa-twitter'},
    { url: '', icon : 'fa fa-google'},
    { url: '', icon : 'fa fa-linkedin'},
    { url: '', icon : 'fa fa-instagram'}
  ]

  socialsClasses : any = {ulClass:"mb-0", liClass:"", linkClass:"nav-link"}

}
