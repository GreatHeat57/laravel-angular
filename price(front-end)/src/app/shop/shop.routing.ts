import { Routes } from '@angular/router';

import { ProductlistComponent } from './productlist/productlist.component';
import { ProductCartComponent } from './productCart/productCart.component';
import { ProductCheckoutComponent } from './productCheckout/productCheckout.component';
import { ProductDetailComponent } from './productDetail/productDetail.component';

export const ShopRoutes: Routes = [{
  path: '',
  redirectTo: 'productlist',
  pathMatch: 'full',
},{
  path: '',
  children: [{
    path: 'product-cart',
    component: ProductCartComponent
  },{
    path: 'product-list',
    component: ProductlistComponent
  },{
    path: 'product-checkout',
    component: ProductCheckoutComponent
  },{
    path: 'product-detail',
    component: ProductDetailComponent
  }]
}];