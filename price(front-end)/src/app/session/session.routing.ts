import { Routes } from '@angular/router';

import { LoginComponent } from './login/login.component';
import { SignUpComponent } from './signUp/signUp.component';
import { ThankYouComponent } from './thankYou/thankYou.component';
import { MaintenanceComponent } from './maintenance/maintenance.component';
import { NotFoundComponent } from './notFound/notFound.component';

export const SessionRoutes: Routes = [{
  path: '',
  redirectTo: 'login',
  pathMatch: 'full'
},{
  path: '',
  children: [{
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'sign-up',
    component: SignUpComponent
  },
  {
    path: 'thank-you',
    component: ThankYouComponent
  },
  {
    path: 'maintenance',
    component: MaintenanceComponent
  },
  {
    path: 'not-found',
    component: NotFoundComponent
  }]
}];