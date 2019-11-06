import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: '[angly-subscribe]',
  templateUrl: './subscribe.component.html',
  styleUrls: ['./subscribe.component.scss']
})
export class SubscribeComponent implements OnInit {

   @Input() subscribeFormClasses : any;

   /* Form name */
   subscribe : FormGroup;
   emailPattern : any = /\S+@\S+\.\S+/;

   constructor( private formBuilder : FormBuilder ) {
      this.subscribe = this.formBuilder.group({
         email : [null, [Validators.required, Validators.pattern(this.emailPattern)] ]
      });
   }

   ngOnInit() {
   }

   subscribeNow(value:any)
   {
      if(this.subscribe.valid)
      {
         console.log(value);
      } else{
         console.log("Error!");
      }
   }

}
