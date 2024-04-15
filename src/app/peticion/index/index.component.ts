import { Component, OnInit } from '@angular/core';
import { Peticion } from '../peticion';
import { PeticionService } from '../peticion.service';
import { ActivatedRoute, Router } from '@angular/router';
// import { AuthStateService } from 'src/app/shared/auth-state.service';
import { Observable, map } from 'rxjs';
import { AuthService, UserLogin } from 'src/app/shared/auth.service';
      
@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {
      
  peticiones : Peticion[] = [];
  mine : boolean = false;

  // log ?: any;
  user ?: UserLogin|any;

  img : string[] = [];

  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(private peticionService: PeticionService,
    private route: ActivatedRoute,
    private router: Router,
    // private authStatus : AuthStateService,
    private authService : AuthService,
    ) { }

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

    this.mine = (this.route.snapshot.routeConfig?.path?.toString() == 'mine') ? true : false;
 
    if(this.mine){
      this.peticionService.getAllUser().subscribe( listPeticiones => {
        this.peticiones = listPeticiones;
      });
    }
    else{
      this.peticionService.getAll().subscribe( listPeticiones => {this.peticiones = listPeticiones; listPeticiones.forEach(peticion => { this.img.push('http://127.0.0.1:8000/' +  peticion.files[0].file_path);})  });
    }

    // this.peticiones.forEach(peticion => { this.img.push('http://127.0.0.1:8000/{{peticion.files[0].file_path}}'); console.log(peticion); })
    // this.peticionService.getAll().subscribe( listPeticiones => {this.peticiones = listPeticiones;  });
    
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  deletePeticion(id:Number){
    this.peticionService.delete(id).subscribe(res => {
         this.peticiones = this.peticiones.filter(item => item.id !== id);
    })
  }
}