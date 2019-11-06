import {map} from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import 'rxjs/Rx';
import { Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs';

interface Response {
  data     : any;
}

@Injectable()
export class ChkService {
   headers: Headers = new Headers();
   options: any;
   // server: string = 'http://localhost/';
   server: string = 'http://laravel.price/';
   constructor( private http: HttpClient) { 
      this.headers.append('enctype', 'multipart/form-data');
      this.headers.append('Content-Type', 'application/json');
      this.headers.append('X-Requested-With', 'XMLHttpRequest');

      this.options = new RequestOptions({ headers: this.headers });
   }

   getCategoryNames()
   {
      return this.http.get<Response>(this.server + 'get-category-names').pipe(map(response => response.data));
   }

   getSearchData(id)
   {
      return this.http.post<Response>(this.server + 'get-search-items', {id: id}).pipe(map(response => response.data));
   }

   getLocationData(id, name, value) {
      return this.http.post<Response>(this.server + 'get-location-items', { id: id, location_name: name, location_value: value }).pipe(map(response => response.data));
   }

   getFeedData(categoryId, searchData, pageNum, dataCount, priceSort)
   {
      var sendData = {'category_id': categoryId, 'search_data': searchData, 'page_num': pageNum, 'data_count': dataCount, 'price_sort': priceSort};
      // console.log(sendData);
      return this.http.post<Response>(this.server + 'get-service-data', sendData).pipe(map(response => response.data));
   }

   getDetailData(id) {
      return this.http.post<Response>(this.server + 'get-detail-data', { id: id }).pipe(map(response => response.data));
   }

   /*
    * Get the content of home page.
    */
   getHomeContent()
   {
      return this.http.get<Response>("assets/data/home.json").pipe(map(response => response.data));
   }

   /*
    * Get services
    */
   getServices()
   {
     return this.http.get<Response>("assets/data/service.json").pipe(map(response => response.data));
   }


   /*
    * Get posts
    */
   getPosts()
   {
      return this.http.get<Response>("assets/data/posts.json").pipe(map(response => response.data));
   }

   /*
    * Get project gallary
    */
   getProjectGallary()
   {
      return this.http.get<Response>("assets/data/project-gallary.json").pipe(map(response => response.data));
   }


   /*
    * Get blog column2.
    */
   getBlogColumn2()
   {
      return this.http.get<Response>("assets/data/blog-column2.json").pipe(map(response => response.data));
   }

   /*
    * Get blog column3.
    */
   getBlogColumn3()
   {
      return this.http.get<Response>("assets/data/blog-column3.json").pipe(map(response => response.data));
   }

   /*
    * Get blog listing sidebar.
    */
   getBlogListingSideBar()
   {
      return this.http.get<Response>("assets/data/blog-listing-sidebar.json").pipe(map(response => response.data));
   }


   /*
    * Get blog masonary2
    */
   getBlogMasonary2()
   {
      return this.http.get<Response>("assets/data/blog-masonary2.json").pipe(map(response => response.data));
   }

   /*
    * Get blog masonary3
    */
   getBlogMasonary3()
   {
      return this.http.get<Response>("assets/data/blog-masonary3.json").pipe(map(response => response.data));
   }

   /*
    * Get blog no sidebar
    */
   getBlogNoSideBar()
   {
      return this.http.get<Response>("assets/data/blog-no-sidebar.json").pipe(map(response => response.data));
   }

   /*
    * Get blog sidebar
    */
   getBlogSidebar()
   {
      return this.http.get<Response>("assets/data/blog-sidebar.json").pipe(map(response => response.data));
   }

   /*
    * Get blog sidebar
    */
   getPopularPosts()
   {
      return this.http.get<Response>("assets/data/popular-posts.json").pipe(map(response => response.data));
   }

   /*
    * Get instagram images
    */
   getInstagramImages()
   {
      return this.http.get<Response>("assets/data/instagram.json").pipe(map(response => response.data));
   }

   /*
    * Get featured post
    */
   getFeaturedPost()
   {
      return this.http.get<Response>("assets/data/featured.json").pipe(map(response => response.data));
   }

   /*
    * Get testimonial
    */
   getTestimonial()
   {
      return this.http.get<Response>("assets/data/testimonial.json").pipe(map(response => response.data));
   }

   /*
    * Get portfolio-v1.
    */
   getPortfolioV1()
   {
    return this.http.get<Response>("assets/data/portfolio-v1.json").pipe(map(response => response.data));
   }

   /*
    * Get portfolio-v2.
    */
   getPortfolioV2()
   {
      return this.http.get<Response>("assets/data/portfolio-v2.json").pipe(map(response => response.data));
   }

   /*
    * Get portfolio-v3.
    */
   getPortfolioV3()
   {
      return this.http.get<Response>("assets/data/portfolio-v3.json").pipe(map(response => response.data));
   }

   /*
   * Get the content of pricing page.
   */
   getPricingPageContent()
   {
    return this.http.get<Response>("assets/data/pricing.json").pipe(map(response => response.data));
   }


   /*
   * Get the content of features page.
   */
   getFeaturesContent()
   {
    return this.http.get<Response>("assets/data/features.json").pipe(map(response => response.data));
   }

   /*
   * Get the categories.
   */
   getcategories()
   {
    return this.http.get<Response>("assets/data/categories.json").pipe(map(response => response.data));
   }

   /*
   * Get the content of contact page.
   */
   getContactContent()
   {
    return this.http.get<Response>("assets/data/contact.json").pipe(map(response => response.data));
   }

   /*
   * Get the content of search page.
   */
   getSearchContent()
   {
    return this.http.get<Response>("assets/data/search.json").pipe(map(response => response.data));
   }

   /*
   * Get the team.
   */
   getTeam()
   {
      return this.http.get<Response>("assets/data/team.json").pipe(map(response => response.data));
   }

   /*
    * Get about.
    */
   getAbout()
   {
      return this.http.get<Response>("assets/data/about.json").pipe(map(response => response.data));
   }

   /*
   * Get the content of support page.
   */
   getSupportContent()
   {
    return this.http.get<Response>("assets/data/support.json").pipe(map(response => response.data));
   }

   /*
    * Get home testimonial
    */
   getHomeTestimonial()
   {
      return this.http.get<Response>("assets/data/home-testimonial.json").pipe(map(response => response.data));
   }

   /*
    * Get footer logo list
    */
   getFooterLogoList()
   {
      return this.http.get<Response>("assets/data/footer-logo.json").pipe(map(response => response.data));
   }

  /*
   * Get the social share list
   */
   getSocialShare()
   {
    return this.http.get<Response>("assets/data/social-share.json").pipe(map(response => response.data));
   }

  /*
   * Get the recent comments 
   */
   getRecentComments()
   {
    return this.http.get<Response>("assets/data/recent-comments.json").pipe(map(response => response.data));
   }

   /*
    * Get contact us widgets
    */
   getContactUsWidgets()
   {
      return this.http.get<Response>("assets/data/contact-us-widgets.json").pipe(map(response => response.data));
   }

   /*
    * Get cart
    */
   getCart()
   {
      return this.http.get<Response>("assets/data/cart.json").pipe(map(response => response.data));
   }

   /*
    * Get tweets
    */
   getTweets()
   {
      return this.http.get<Response>("assets/data/latest-tweets.json").pipe(map(response => response.data));
   }

   /*
    * Get tags
    */
   getTags()
   {
      return this.http.get<Response>("assets/data/tags.json").pipe(map(response => response.data));
   }

   /*
    * Get archive
    */
   getArchive()
   {
      return this.http.get<Response>("assets/data/archive.json").pipe(map(response => response.data));
   }

   /*
    * Get about the author
    */
   getAboutAuthor()
   {
      return this.http.get<Response>("assets/data/about-author.json").pipe(map(response => response.data));
   }

   /*
    * Get about the author
    */
   getTabContent()
   {
      return this.http.get<Response>("assets/data/tab-content.json").pipe(map(response => response.data));
   }

   /*
    * Get products list
    */
   getProductsList()
   {
      return this.http.get<Response>("assets/data/products-list.json").pipe(map(response => response.data));
   }

   /*
    * Get related products list
    */
   getRelatedProducts()
   {
      return this.http.get<Response>("assets/data/related-products.json").pipe(map(response => response.data));
   }

}
