import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SigninComponent } from './components/signin/signin.component';
import { SignupComponent } from './components/signup/signup.component';
import { UserProfileComponent } from './components/user-profile/user-profile.component';

const routes: Routes = [
{ path: '', redirectTo: 'peticiones', pathMatch: 'full' },
{ path: 'home', component: SigninComponent },
{ path: 'login', component: SigninComponent },
{ path: 'register', component: SignupComponent },
{ path: 'profile', component: UserProfileComponent },
{ path: 'peticiones', loadChildren: ()=>import('./peticion/peticion.module').then(m => m.PeticionModule) },
{ path: '**', redirectTo: 'home', pathMatch: 'full' },
// { path: '**', redirectTo: 'peticiones', pathMatch: 'full' },
];
@NgModule({
imports: [RouterModule.forRoot(routes)],
exports: [RouterModule],
})
export class AppRoutingModule {}



















// import { BrowserModule } from '@angular/platform-browser';
// import { NgModule } from '@angular/core';
// import { AppComponent } from './app.component';
// import { SigninComponent } from './components/signin/signin.component';
// import { SignupComponent } from './components/signup/signup.component';
// import { UserProfileComponent } from './components/user-profile/user-profile.component';
// import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
// import { ReactiveFormsModule, FormsModule } from '@angular/forms';
// import { AuthInterceptor } from './shared/auth-interceptor.service';
// @NgModule({
//   declarations: [
//     AppComponent,
//     SigninComponent,
//     SignupComponent,
//     UserProfileComponent,
//   ],
//   imports: [
//     BrowserModule,
//     HttpClientModule,
//     ReactiveFormsModule,
//     FormsModule,
//   ],
//   providers: [
//     {
//       provide: HTTP_INTERCEPTORS,
//       useClass: AuthInterceptor,
//       multi: true,
//     },
//   ],
//   bootstrap: [AppComponent],
// })
// export class AppModule {}

// import { NgModule } from '@angular/core';
// import { Routes, RouterModule } from '@angular/router';
// import { SigninComponent } from './components/signin/signin.component';
// import { SignupComponent } from './components/signup/signup.component';
// import { UserProfileComponent } from './components/user-profile/user-profile.component';

// const routes: Routes = [
//   { path: '', redirectTo: '/login', pathMatch: 'full' },
//   { path: 'login', component: SigninComponent },
//   { path: 'register', component: SignupComponent },
//   { path: 'profile', component: UserProfileComponent },
// ];
// @NgModule({
//   imports: [RouterModule.forRoot(routes)],
//   exports: [RouterModule],
// })
// export class AppRoutingModule {}

// import { NgModule } from '@angular/core';
// import { RouterModule, Routes } from '@angular/router';

// const routes: Routes = [];

// @NgModule({
//   imports: [RouterModule.forRoot(routes)],
//   exports: [RouterModule]
// })
// export class AppRoutingModule { }
