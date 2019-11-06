import { Routes } from '@angular/router';

import { BlogMasonary2Component } from './blogMasonry2/blogMasonry2.component';
import { BlogMasonary3Component } from './blogMasonry3/blogMasonry3.component';
import { BlogColumn2Component } from './blogColumn2/blogColumn2.component';
import { BlogColumn3Component } from './blogColumn3/blogColumn3.component';
import { BlogSidebarComponent } from './blogSidebar/blogSidebar.component';
import { BlogNoSidebarComponent } from './blogNoSidebar/blogNoSidebar.component';
import { BlogListingSideBarComponent } from './blogListingSideBar/blogListingSideBar.component';
import { BlogDetailComponent } from './blogDetail/blogDetail.component';

export const BlogsRoutes: Routes = [{
  path: '',
  redirectTo: 'blog-column2',
  pathMatch: 'full',
},{
  path: '',
  children: [{
    path: 'blog-masonry2',
    component: BlogMasonary2Component
  },{
     path: 'blog-masonry3',
    component: BlogMasonary3Component
  },{
    path: 'blog-column2',
    component: BlogColumn2Component
  },{
    path: 'blog-column3',
    component: BlogColumn3Component
  },{
     path: 'blog-sidebar',
    component: BlogSidebarComponent
  },{
    path: 'blog-no-sidebar',
    component: BlogNoSidebarComponent
  },{
    path: 'blog-listing-sidebar',
    component: BlogListingSideBarComponent
  },{
    path: 'blog-detail/:id',
    component: BlogDetailComponent
  }]
}];
