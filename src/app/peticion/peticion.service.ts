import { Injectable } from '@angular/core';
import { HttpClient, HttpClientModule, HttpHeaders } from '@angular/common/http';
   
import {  Observable, throwError } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';
import { Categoria, Peticion } from './peticion';
import { AuthService, User } from '../shared/auth.service';
import { TokenService } from '../shared/token.service';
     
@Injectable({
  providedIn: 'root'
})
export class PeticionService {
   
  // private apiURL = "http://127.0.0.1:8000/api/peticiones/";
  private apiURL = "http://127.0.0.1:8000/api";
  
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }
  
  constructor(private httpClient : HttpClient, private authService : AuthService) { 
  }

  getFirmadas(): Observable<Peticion[]> {
    return this.httpClient.get<Peticion[]>(this.apiURL + '/peticiones/firmadas')
    .pipe(
      catchError(this.errorHandler)
    )
  }


  getAll(): Observable<Peticion[]> {

    return this.httpClient.get<Peticion[]>(this.apiURL + '/peticiones/')
    .pipe(
      catchError(this.errorHandler)
    )
  }

  getAllUser(): Observable<Peticion[]> {
    return this.httpClient.get<Peticion[]>(this.apiURL + '/mispeticiones/')
    .pipe(
      catchError(this.errorHandler)
    )
  }

  // getCategorias(): Observable<Categoria[]> {
  //   return this.httpClient.get<Categoria[]>( "http://127.0.0.1:8000/api/categorias")
  //   .pipe(
  //     catchError(this.errorHandler)
  //   )
  // }
   
  // create(peticion : Peticion): Observable<Peticion> {
  //   return this.httpClient.post<Peticion>(this.apiURL + '/peticiones/', JSON.stringify(peticion), this.httpOptions)
  //   .pipe(
  //     catchError(this.errorHandler)
  //   )
  // } 
   
  create(peticion : FormData): Observable<Peticion> {
    const headers = new HttpHeaders();

    headers.append('Content-Type','multipart/form-data');
    headers.append('Accept','application/json');

    // console.log(headers);

    return this.httpClient.post<Peticion>(this.apiURL + '/peticiones/', peticion, {headers:headers})
    .pipe(
      catchError(this.errorHandler)
    )
  }  
   
  find(id : Number): Observable<Peticion> {
    return this.httpClient.get<Peticion>(this.apiURL + '/peticiones/' + id)
    .pipe(
      catchError(this.errorHandler)
    )
  }
   
  update(id : Number, peticion : Peticion): Observable<Peticion> {
    return this.httpClient.put<Peticion>(this.apiURL + '/peticiones/' + id, JSON.stringify(peticion), this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  delete(id : Number){
    return this.httpClient.delete<Peticion>(this.apiURL + '/peticiones/' + id, this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  // Route::put('peticiones/firmar/{id}', 'firmar');    
  firmar(id : Number){
    return this.httpClient.put<Peticion>(this.apiURL + '/peticiones/firmar/' + id, this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  errorHandler(error : any) {
    let errorMessage = '';
    if(error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return throwError(errorMessage);
 }
}