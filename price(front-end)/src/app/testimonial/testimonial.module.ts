import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { TestimonialRoutes } from './testimonial.routing';
import { WidgetsModule } from '../widgets/widgets.module';

import { Testimonial1Component } from './testimonial1/testimonial1.component';
import { Testimonial2Component } from './testimonial2/testimonial2.component';

@NgModule({
  imports: [
	CommonModule,
	FormsModule,
	RouterModule.forChild(TestimonialRoutes),
	WidgetsModule
  ],
  declarations: [
     Testimonial1Component,
     Testimonial2Component
  ]
})
export class TestimonialModule { }
