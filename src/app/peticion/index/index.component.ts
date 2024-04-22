import { Component, OnInit } from '@angular/core';
import { Peticion } from '../peticion';
import { PeticionService } from '../peticion.service';
import { ActivatedRoute, Router } from '@angular/router';
// import { AuthStateService } from 'src/app/shared/auth-state.service';
// import { Observable, map } from 'rxjs';
import { AuthService, UserLogin } from 'src/app/shared/auth.service';
      
@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {
      
  peticiones : Peticion[] = [];

  // log ?: any;
  user ?: UserLogin|any;

  img : string[] = [];

  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(private peticionService: PeticionService,
    private authService : AuthService,
    ) { 
    }

  getLog(peticion : Peticion) {
    // this.authStatus.userAuthState.subscribe(data => this.log = data);
    this.getAuthoritation();
    
    if(peticion.user_id === this.user?.id){
      return true;
    }
    
    if(this.user?.role_id === 1){
      return true;
    }    

    return false;
  }

  getAuthoritation(){
    this.user = this.authService.getUser();
    return this.user;
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  ngOnInit(): void {
    this.chargeAll();    
  }
  
  /**
   * Write code on Method
   *
   * @return response()
   */
  deletePeticion(id:Number){
    console.log(id);

    this.peticionService.delete(id).subscribe(res => {console.log(res)});

    this.chargeAll();
  }

  chargeAll(){
    this.peticionService.getAll().subscribe( listPeticiones => {this.peticiones = listPeticiones; listPeticiones.forEach(peticion => { this.img.push('http://127.0.0.1:8000/' +  peticion.files[0].file_path);})  });
  }
}