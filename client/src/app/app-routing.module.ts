import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';

import { HomeComponent } from './pages/home/home.component';
import {NavComponent} from './shared/nav/nav.component';
import {EstatesComponent} from './pages/estates/estates.component';
import {EstateDetailComponent} from './pages/estate-detail/estate-detail.component';


const ROUTES: Routes = [
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'estatesList',
    loadChildren: () => import('./pages/estates/estates.module').then(m => m.EstatesModule)
  },
  {
    path: 'estateDetail',
    component: EstateDetailComponent
  }
];

@NgModule({
  declarations: [
  ],
  imports: [
    CommonModule,
    RouterModule.forRoot(ROUTES)
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
