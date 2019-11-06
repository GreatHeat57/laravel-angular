import { Routes } from '@angular/router';

import { PortfolioGridV1Component } from './portfolioGridV1/portfolioGridV1.component';
import { PortfolioGridV2Component } from './portfolioGridV2/portfolioGridV2.component';
import { PortfolioGridV3Component } from './portfolioGridV3/portfolioGridV3.component';


export const PortfolioRoutes: Routes = [{
  path: '',
  redirectTo: 'portfolio-v1',
  pathMatch: 'full',
},{
  path: '',
  children: [{
    path: 'portfolio-v1',
    component: PortfolioGridV1Component
  },{
    path: 'portfolio-v2',
    component: PortfolioGridV2Component
  },{
    path: 'portfolio-v3',
    component: PortfolioGridV3Component
  }]
}];
