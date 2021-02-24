import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReadMoreComponent } from './read-more/read-more.component';



@NgModule({
  declarations: [ReadMoreComponent],
  exports: [
    ReadMoreComponent
  ],
  imports: [
    CommonModule
  ]
})
export class EstateDetailModule { }
