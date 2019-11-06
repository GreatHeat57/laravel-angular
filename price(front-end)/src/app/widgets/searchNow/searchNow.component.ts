import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'angly-searchNow',
  templateUrl: './searchNow.component.html',
  styleUrls: ['./searchNow.component.scss']
})
export class SearchNowComponent implements OnInit {

  /* Variables */
  searchForm : FormGroup;

  constructor(private formBuilder : FormBuilder) {
    this.searchForm = this.formBuilder.group({
        name : [null, [Validators.required] ]
      });
  }

  ngOnInit() {
  }

  searchNow(value:any)
  {
    if(this.searchForm.valid)
    {
      console.log(value);
    } else{
      console.log("Error!");
    }
  }

}
