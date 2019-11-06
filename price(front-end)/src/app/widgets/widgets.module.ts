import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { SlickModule } from 'ngx-slick';
import { AgmCoreModule } from '@agm/core';

import { ContactComponent } from './contact/contact/contact.component';
import { MenuBlockComponent } from './menuBlock/menuBlock.component';
import { CallToActionComponent } from './callToAction/callToAction.component';
import { ServiceGridComponent } from './grid/serviceGrid/serviceGrid.component';
import { PostGridComponent } from './grid/postGrid/postGrid.component';
import { GallaryGridComponent } from './grid/gallaryGrid/gallaryGrid.component';
import { SocialsComponent } from './socialShare/socials/socials.component';
import { CategoriesListComponent } from './list/categoriesList/categoriesList.component';
import { SubscribeComponent } from './subsribeForm/subscribe/subscribe.component';
import { SearchNowComponent } from './searchNow/searchNow.component';
import { TeamComponent } from './team/team.component';
import { testimonialSliderComponent } from './testimonial/testimonialSlider/testimonialSlider.component';
import { TeamGridComponent } from './grid/teamGrid/teamGrid.component';
import { HomeContactComponent } from './contact/homeContact/homeContact.component';
import { SendMessageComponent } from './contact/sendMessage/sendMessage.component';
import { MobileFeaturedComponent } from './mobileFeatured/mobileFeatured.component';
import { ChkVideoComponent } from './chkVideo/chkVideo.component';
import { PopularPostsComponent } from './list/popularPosts/popularPosts.component';
import { InstagramGallaryComponent } from './grid/instagramGallary/instagramGallary.component';
import { SocialShareListComponent } from './list/socialShareList/socialShareList.component';
import { SocialTagsComponent } from './socialShare/socialTags/socialTags.component';
import { RecentCommentsWithDateComponent } from './list/recentCommentsWithDate/recentCommentsWithDate.component';
import { RecentCommentsWithIconComponent } from './list/recentCommentsWithIcon/recentCommentsWithIcon.component';
import { SubsribeSidebarComponent } from './subsribeForm/subsribeSidebar/subsribeSidebar.component';
import { ContactUsListComponent } from './list/contactUsList/contactUsList.component';
import { ContactUs2Component } from './contact/contactUs2/contactUs2.component';
import { CartComponent } from './list/cart/cart.component';
import { TabStructureComponent } from './tabStructure/tabStructure.component';
import { LatestTweetsComponent } from './list/latestTweets/latestTweets.component';
import { Category2Component } from './list/category2/category2.component';
import { Tags1Component } from './tags/tags1/tags1.component';
import { Tags2Component } from './tags/tags2/tags2.component';
import { TestimonialComponent } from './testimonial/testimonial/testimonial.component';
import { Testimonial2Component } from './testimonial/testimonial2/testimonial2.component';
import { ArchiveComponent } from './list/archive/archive.component';
import { AboutAuthorComponent } from './aboutAuthor/aboutAuthor.component';
import { FooterLogoListComponent } from './footerLogoList/footerLogoList.component'

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    FormsModule,
    ReactiveFormsModule,
    SlickModule.forRoot(),
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyD4y2luRxfM8Q8yKHSLdOOdNpkiilVhD9k'
    })
  ],
  declarations: [
    ContactComponent,
    MenuBlockComponent,
    CallToActionComponent,
    ServiceGridComponent,
    PostGridComponent,
    GallaryGridComponent,
    SocialsComponent,
    CategoriesListComponent,
    SubscribeComponent,
    SearchNowComponent,
    TeamComponent,
    testimonialSliderComponent,
    TeamGridComponent,
    HomeContactComponent,
    SendMessageComponent,
    MobileFeaturedComponent,
    ChkVideoComponent,
    PopularPostsComponent,
    InstagramGallaryComponent,
    SocialShareListComponent,
    SocialTagsComponent,
    RecentCommentsWithDateComponent,
    RecentCommentsWithIconComponent,
    SubsribeSidebarComponent,
    ContactUsListComponent,
    ContactUs2Component,
    CartComponent,
    TabStructureComponent,
    LatestTweetsComponent,
    Category2Component,
    Tags1Component,
    Tags2Component,
    TestimonialComponent,
    Testimonial2Component,
    ArchiveComponent,
    AboutAuthorComponent,
    FooterLogoListComponent
  ],
  exports:[
    ContactComponent,
    MenuBlockComponent,
    CallToActionComponent,
    ServiceGridComponent,
    PostGridComponent,
    GallaryGridComponent,
    SocialsComponent,
    CategoriesListComponent,
    SubscribeComponent,
    SearchNowComponent,
    TeamComponent,
    testimonialSliderComponent,
    TeamGridComponent,
    HomeContactComponent,
    SendMessageComponent,
    MobileFeaturedComponent,
    ChkVideoComponent,
    PopularPostsComponent,
    InstagramGallaryComponent,
    SocialShareListComponent,
    SocialTagsComponent,
    RecentCommentsWithIconComponent,
    RecentCommentsWithDateComponent,
    SubsribeSidebarComponent,
    ContactUsListComponent,
    ContactUs2Component,
    CartComponent,
    TabStructureComponent,
    LatestTweetsComponent,
    Category2Component,
    Tags1Component,
    Tags2Component,
    TestimonialComponent,
    Testimonial2Component,
    ArchiveComponent,
    AboutAuthorComponent,
    FooterLogoListComponent
  ]
})
export class WidgetsModule { }
