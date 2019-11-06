import { Routes } from '@angular/router';

import { Testimonial1Component } from './testimonial1/testimonial1.component';
import { Testimonial2Component } from './testimonial2/testimonial2.component';

export const TestimonialRoutes: Routes = [{
  path: '',
  redirectTo: 'testimonial-v1',
  pathMatch: 'full',
},{
  path: '',
  children: [{
    path: 'testimonial-v1',
    component: Testimonial1Component
  },{
    path: 'testimonial-v2',
    component: Testimonial2Component
  }]
}];
