import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable()
export class PageTitleService {
    public title: BehaviorSubject<string> = new BehaviorSubject<string>(null);
    public subTitle: BehaviorSubject<string> = new BehaviorSubject<string>(null);

    setTitle(value: string) {
        this.title.next(value);
    }

    setSubTitle(value: string) {
      this.subTitle.next(value);
    }
}
