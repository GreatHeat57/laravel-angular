import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'angly-subsribeSidebar',
  templateUrl: './subsribeSidebar.component.html',
  styleUrls: ['./subsribeSidebar.component.scss']
})
export class SubsribeSidebarComponent implements OnInit {

	/* Form name */
	subscribe : FormGroup;
	emailPattern = /\S+@\S+\.\S+/;

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
