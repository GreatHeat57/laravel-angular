import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ClickOutside } from './click-outside.directive';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    ClickOutside
  ],
  exports: [ 
      ClickOutside
  ]
})
export class DirectivesModule { }
