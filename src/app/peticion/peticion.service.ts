import { Injectable } from '@angular/core';
import { HttpClient, HttpClientModule, HttpHeaders } from '@angular/common/http';
   
import {  Observable, throwError } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Categoria, Peticion } from './peticion';
import { User } from '../shared/auth.service';
import { TokenService } from '../shared/token.service';
     
@Injectable({
  providedIn: 'root'
})
export class PeticionService {
   
  private apiURL = "http://127.0.0.1:8000/api/peticiones/";

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }
  
  constructor(private httpClient : HttpClient) { }
   
  getAll(): Observable<Peticion[]> {

    return this.httpClient.get<Peticion[]>(this.apiURL)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  getAllUser(): Observable<Peticion[]> {
    return this.httpClient.get<Peticion[]>(this.apiURL)
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
   
  create(peticion : Peticion): Observable<Peticion> {
    return this.httpClient.post<Peticion>(this.apiURL, JSON.stringify(peticion), this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }  
   
  find(id : Number): Observable<Peticion> {
    return this.httpClient.get<Peticion>(this.apiURL + id)
    .pipe(
      catchError(this.errorHandler)
    )
  }
   
  update(id : Number, peticion : Peticion): Observable<Peticion> {
    return this.httpClient.put<Peticion>(this.apiURL + id, JSON.stringify(peticion), this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }
   
  delete(id : Number){
    return this.httpClient.delete<Peticion>(this.apiURL + id, this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  // Route::put('peticiones/firmar/{id}', 'firmar');    
  firmar(id : Number){
    return this.httpClient.put<Peticion>(this.apiURL + 'firmar/' + id, this.httpOptions)
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