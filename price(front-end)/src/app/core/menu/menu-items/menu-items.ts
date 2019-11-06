import { Injectable } from '@angular/core';

/*
 * Menu interface
 */
export interface Menu {
	state: string;
	name?: string;
	type?: string;
	icon?: string;
	children?: ChildrenItems[];
}

/*
 * Children menu interface
 */
export interface ChildrenItems {
  	state: string;
  	name: string;
  	type?: string;
}

const HEADERMENUITEMS = [
   {
      state: "home",
      name: "Home",
      type:"link"
   },
   {
      state:"blog-column2",
      name:"Service",
      type: "link"
   }
   ];

const FOOTERMENU = [
   {
      state: "home",
      name: "Home",
      type:"link"
   },
   {
      state:"features",
      name:"Features",
      type:"link"
   },
   {
      state:"pricing",
      name:"Pricing",
      type:"link"
   },
   {
      state:"contact",
      name:"Contact",
      type:"link"
   },
   {
      state:"team",
      name:"Team",
      type:"link"
   },
   {
      state:"about",
      name:"About",
      type:"link"
   }
]

const EXPLOREMENU = [
   {
      state: "home",
      name: "Dashboard",
      type:"link"
   },
   {
      state: "sign-in",
      name: "Sign In",
      type:"link"
   },
   {
      state: "sign-up",
      name: "Sign Up",
      type:"link"
   },
   {
      state: "helpdesk",
      name: "Helpdesk",
      type:"link"
   },
   {
      state: "privacy-policy",
      name: "Privacy Policy",
      type:"link"
   },
   {
      state: "terms-conditions",
      name: "Terms & Conditions ",
      type:"link"
   }
];

const FOOTERMENU2 = [
   {
      state: "home",
      name: "Home",
      type:"link"
   },
   {
      state:"sidebar-widgets",
      name:"Widgets",
      type:"link"
   },
   {
      state:"about",
      name:"About",
      type:"link"
   },
   {
      state:"contact",
      name:"Contact",
      type:"link"
   },
   {
      state:"features",
      name:"Features",
      type:"link"
   },
   {
      state:"support",
      name:"Support",
      type:"link"
   },
   {
      state:"search",
      name:"Search",
      type:"link"
   }
];

@Injectable()
export class MenuItems {

   /*
    * Get all header menu
    */
   getMainMenu(): Menu[] {
      return HEADERMENUITEMS;
   }

   /*
    * Get footer menu
    */
   getFooterMenu(): Menu[] {
      return FOOTERMENU;
   }

   /*
    * Get the explore menu
    */
   getExploreMenu(): Menu[] {
      return EXPLOREMENU;
   }

   /*
    * Get the footer2
    */
   getFooter2(): Menu[] {
      return FOOTERMENU2;
   }

}
