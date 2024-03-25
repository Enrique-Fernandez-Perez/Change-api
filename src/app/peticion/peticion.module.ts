import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PeticionRoutingModule } from './peticion-routing.module';
import { IndexComponent } from './index/index.component';
import { ViewComponent } from './view/view.component';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FirmasComponent } from './firmas/firmas.component';
  
@NgModule({
  declarations: [IndexComponent, ViewComponent, CreateComponent, EditComponent, FirmasComponent],
  imports: [
    CommonModule,
    PeticionRoutingModule,
    FormsModule,
    ReactiveFormsModule,
  ]
})
export class PeticionModule { }