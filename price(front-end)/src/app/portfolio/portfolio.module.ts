import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { PortfolioRoutes } from './portfolio.routing';
import { WidgetsModule } from '../widgets/widgets.module';

import { PortfolioGridV1Component } from './portfolioGridV1/portfolioGridV1.component';
import { PortfolioGridV2Component } from './portfolioGridV2/portfolioGridV2.component';
import { PortfolioGridV3Component } from './portfolioGridV3/portfolioGridV3.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    RouterModule.forChild(PortfolioRoutes),
    WidgetsModule
  ],
  declarations: [ 
  	PortfolioGridV1Component, 
  	PortfolioGridV2Component, 
  	PortfolioGridV3Component
  ]
})
export class PortfolioModule { }
