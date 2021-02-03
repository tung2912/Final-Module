import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BannerComponent } from './banner/banner.component';
import { EstatesListComponent } from './estates-list/estates-list.component';
import { HighlightsBlogsComponent } from './highlights-blogs/highlights-blogs.component';
import {HomeComponent} from './home.component';



@NgModule({
  declarations: [
    BannerComponent,
    EstatesListComponent,
    HighlightsBlogsComponent,
    HomeComponent
  ],
  exports: [
    BannerComponent,
    EstatesListComponent,
    HighlightsBlogsComponent
  ],
  imports: [
    CommonModule
  ]
})
export class HomeModule { }
