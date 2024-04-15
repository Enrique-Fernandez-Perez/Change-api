import { Injectable } from '@angular/core';
import { Observable, map } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { TokenService } from './token.service';

// User interface
export class User {
  name!: String;
  email!: String;
  password!: String;
  password_confirmation!: String;
}

export class UserLogin {
  id ?: number;
  name!: String;
  email!: String;
  password!: String;
  password_confirmation!: String;
  role_id ?: number;
}

@Injectable({
  providedIn: 'root',
})
export class AuthService {

  constructor(private http: HttpClient,
    private tokenService: TokenService,) {}
  // User registration
  register(user: User): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/register', user);
  }
  // Login
  signin(user: User): Observable<any> {
    return this.http.post<any>('http://127.0.0.1:8000/api/login', user);
  }
  
  // Access user profile
  profileUser(): Observable<User> {
    // return this.http.get('http://127.0.0.1:8000/api/user-profile');
    return this.http.get<User>('http://127.0.0.1:8000/api/me');
  }

  user ?: User;

  getUser(){
    const token = this.tokenService.getToken();
    
    if(!token){
      return false;
    }

    const headers = new HttpHeaders();
    
    headers.set(
      'Authorization', "Bearer " + token
    );

    this.http.get<User>('http://127.0.0.1:8000/api/me',{headers}).subscribe(data => this.user = data);
    return this.user;
  }
}