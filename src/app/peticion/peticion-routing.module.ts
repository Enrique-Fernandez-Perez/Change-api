import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { ViewComponent } from './view/view.component';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';
import { FirmasComponent } from './firmas/firmas.component';
import { MyIndexComponent } from './my-index/my-index.component';
  
const routes: Routes = [
  { path: 'create', component: CreateComponent },
  { path: 'mine', component: MyIndexComponent },
  { path: 'peticionesfirmadas', component: FirmasComponent }, 
  { path: 'edit/:Id', component: EditComponent ,},
  { path: ':Id', component: ViewComponent },
  { path: '', component: IndexComponent },
  // { path: '', redirectTo: 'peticiones', pathMatch: 'full'},
];
  
@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PeticionRoutingModule { }