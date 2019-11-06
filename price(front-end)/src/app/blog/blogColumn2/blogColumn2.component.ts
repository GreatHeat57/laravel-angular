import { Component, OnInit, ViewChild, ElementRef, AfterViewInit, ViewChildren } from '@angular/core';
import { ChkService } from '../../service/chk.service';

import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import { Observable } from 'rxjs';
import { startWith, map } from 'rxjs/operators';

export interface StateGroup {
  letter: string;
  names: string[];
}

export const _filter = (opt: string[], value: string): string[] => {
  const filterValue = value.toLowerCase();

  return opt.filter(item => item.toLowerCase().indexOf(filterValue) === 0);
};

@Component({
  selector: 'angly-blogColumn2',
  templateUrl: './blogColumn2.component.html',
  styleUrls: ['./blogColumn2.component.scss']
})

export class BlogColumn2Component implements OnInit {

  /* Variables */
  categories: any;
  showSetting: any;
  searchItems: any;
  searchValue;

  items;
  searchForm;
  serviceDatas;
  paginationTotal;
  paginationData;
  paginationState = {};
  categoryId:any = 1;
  sortPrice:any = 'not';

  loading: boolean;

  LocationData = [];

  constructor(private service: ChkService, 
              private formBuilder: FormBuilder,
              private _formBuilder: FormBuilder
              ) {

    this.setFormBuilder();

    this.service.getCategoryNames().
      subscribe(response => { 
          this.categories = response; 
          this.SelCategory(this.categories[0]['id']);
          // this.getServiceData(this.categories[0]['id'], '', 1, 10, this.sortPrice);
        },
        err => console.log(err),
        () => this.categories
      );

    this.paginationState['current'] = 1;
    this.paginationState['start'] = 1;
    this.paginationState['prev'] = 1;
    this.paginationState['next'] = 1;
    this.paginationState['end'] = 1;

    this.LocationData['country'] = [];
    this.LocationData['region'] = [];
    this.LocationData['city'] = [];

    // this.makePagination(1);
    
   }

  ngOnInit() {
  }
  flag = 1;

  SelCategory(id) {
    this.flag = 1;
    this.categoryId = id;
    this.searchForm.reset();
    this.getSearchItems(id);
    this.getServiceData(id, null, 1, 10, this.sortPrice);
  }

  SetSortPrice () {
    if (this.sortPrice == 'true') {
      this.sortPrice = 'false';
    }
    else if (this.sortPrice == 'false') {
      this.sortPrice = 'not';
    }
    else {
      this.sortPrice = 'true';
    }
    this.getServiceData(this.categoryId, this.searchValue, this.paginationState['current'], 10, this.sortPrice);
  }

  getServiceData(categoryId, searchData, pageNum, dataCount, priceSort) {
    // console.log(categoryId + ":" + searchData + ":" + pageNum);
    this.loading = true;
    this.service.getFeedData(categoryId, searchData, pageNum, dataCount, priceSort).
      subscribe(response => {
        this.loading = false;
        var res = response.data;
        for(var i = 0; i < res.length; i ++) {
          var imgStr: string = res[i]['image'];
          res[i]['image'] = imgStr.split('|');
        }
        this.serviceDatas = res;
        this.paginationTotal = response.dataNum;
        if (this.flag)this.makePagination(1);
        this.flag = 1;
      },
        err => { console.log(err); alert('error'); this.loading = false;},
        () => this.categories
      );
  }

  //get search all
  SearchAll() 
  {
    this.searchForm.reset();
    this.getServiceData(this.categoryId, null, 1, 10, 'not');
  }

  //get search data(for search items); param: id-cateogry id; call: service.getSearchItems, set: this.searchItems, this.showSetting; return: null;
  getSearchItems(id) {
    this.service.getSearchData(id).subscribe(response => {
      var items = response.items;
      this.searchItems = items;
      for (var x in items){
        if (items[x]['field_name'] == 'country') {
          this.LocationData['country'] = items[x]['value'];
        } else if (items[x]['field_name'] == 'region') {
          this.LocationData['region'] = items[x]['value'];
        } else if (items[x]['field_name'] == 'city') {
          this.LocationData['city'] = items[x]['value'];
        }
      }
      this.showSetting = response.show_array;
    },
    err => console.log(err),
    () => this.searchItems
    );
  }

  getLocationItems(e, fieldName) {
    if (e.value == '') return;
    this.service.getLocationData(this.categoryId, fieldName, e.value).subscribe(response => {
      for (var x in response) {
        this.LocationData[x] = response[x];
      }
    },
      err => console.log(err),
      () => this.searchItems
    );
  }

  //trigger search action; call: makeSearchItems(), getServiceData; return: null;
  startSearch() {
    this.makeSearchItems();
    this.getServiceData(this.categoryId, this.searchValue, this.paginationState['current'], 10, this.sortPrice);
  }

  //make search data, return: null, setVariable: this.searchValue
  makeSearchItems() {
    var FormValues = this.searchForm.value;
    
    var sendValue = {}
    for (var x in FormValues) {
      
      if (FormValues[x] != null){
        if (typeof (FormValues[x]) == 'string') {
          if (FormValues[x] != '') sendValue[x] = FormValues[x];
        } else if (typeof (FormValues[x]) == 'object') {
          if ((FormValues[x]['min'] != '' && FormValues[x]['max'] != '') && FormValues[x]['min'] != null && FormValues[x]['max'] != null) {
            sendValue[x] = {};
            sendValue[x]['min'] = FormValues[x]['min'];
            sendValue[x]['max'] = FormValues[x]['max'];
          }
        }
      }
    }
    this.searchValue = sendValue;
  }

  makePagination(num) {
    num = Number(num);

    this.paginationState = {};
    this.paginationState['current'] = num;
    this.paginationState['start'] = 1;
    this.paginationState['end'] = this.paginationTotal;

    var paginationAry = [];
    var start = 0;
    var end = 10;
    var fact = (Math.ceil(num / 10) - 1) * 10 + 1;

    if (fact > 10) {
      paginationAry[0] = []
      paginationAry[0]['text'] = "...";
      paginationAry[0]['value'] = fact - 1;
      start = 1;
      end = 10 + 1;
    }
    if (num > 1) this.paginationState['prev'] = num - 1;
    else this.paginationState['prev'] = num;
    for (var i = start; i < end; i++) {
      paginationAry[i] = [];
      paginationAry[i]['text'] = fact;
      paginationAry[i]['value'] = fact;
      if (fact == this.paginationTotal) break;
      fact++;
    }
    if (num < this.paginationTotal) this.paginationState['next'] = num + 1;
    else this.paginationState['next'] = num;

    if ((fact + 1) < this.paginationTotal) {
      paginationAry[i] = []
      paginationAry[i]['text'] = "...";
      paginationAry[i]['value'] = fact;
    }

    this.paginationData = paginationAry;
    if (!this.flag) this.startSearch();
  }

  setFormBuilder() {
    this.searchForm = this.formBuilder.group({
      title: '',
      star: '',
      rating: '',
      travel_type: '',
      service_type: '',
      country: '',
      region: '',
      city: '',
      allinclusive: '',
      option1: '',
      option2: '',
      option3: '',
      option4: '',
      option5: '',
      departure_date: '',
      price: this.formBuilder.group({
        min: '',
        max: ''
      }),
      duration: this.formBuilder.group({
        min: '',
        max: ''
      }),
      num_person: this.formBuilder.group({
        min: '',
        max: ''
      }),
      num_offer: this.formBuilder.group({
        min: '',
        max: ''
      }),
      latitude: this.formBuilder.group({
        min: '',
        max: ''
      }),
      longitude: this.formBuilder.group({
        min: '',
        max: ''
      })
    });
  }
}

var _TradeTrackerTagOptions = {
  t: 'a',
  s: '289262',
  chk: '025d01126ab0e4ab90d4e9408ad72630',
  overrideOptions: {}
};
// (function () {
//   var tt = document.createElement('script'), s =
//     document.getElementsByTagName('script')[0]; tt.setAttribute('type', 'text/javascript');
//   tt.setAttribute('src', (document.location.protocol == 'https:' ? 'https' : 'http') +
//     '://tm.tradetracker.net/tag?t=' + _TradeTrackerTagOptions.t + '&amp;s=' +
//     _TradeTrackerTagOptions.s + '&amp;chk=' + _TradeTrackerTagOptions.chk);
//   s.parentNode.insertBefore(tt, s);
//   alert(s);  
// })();
