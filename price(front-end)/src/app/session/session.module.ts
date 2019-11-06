import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { SessionRoutes } from './session.routing';
import { WidgetsModule } from '../widgets/widgets.module';

import { LoginComponent } from './login/login.component';
import { SignUpComponent } from './signUp/signUp.component';
import { ThankYouComponent } from './thankYou/thankYou.component';
import { MaintenanceComponent } from './maintenance/maintenance.component';
import { NotFoundComponent } from './notFound/notFound.component';


@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(SessionRoutes),
    WidgetsModule
  ],
  declarations: [
	  LoginComponent,
	  SignUpComponent,
	  ThankYouComponent,
	  MaintenanceComponent,
	  NotFoundComponent,
  ]
})
export class SessionModule { }
