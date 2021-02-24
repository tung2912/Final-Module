import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EstatesComponent } from './estates.component';
import {HighlightsBlogsModule} from '../../shared/components/highlights-blogs/highlights-blogs.module';
import {RouterModule} from '@angular/router';

@NgModule({
  declarations: [EstatesComponent],
  imports: [
    CommonModule,
    HighlightsBlogsModule,
    RouterModule.forChild([
      {
        path: '',
        component: EstatesComponent
      }
    ])
  ]
})
export class EstatesModule { }
