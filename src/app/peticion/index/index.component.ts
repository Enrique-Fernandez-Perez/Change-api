import { Component, OnInit } from '@angular/core';
import { Peticion } from '../peticion';
import { PeticionService } from '../peticion.service';
import { ActivatedRoute, Router } from '@angular/router';
import { AppComponent } from 'src/app/app.component';
import { map } from 'rxjs';
      
@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {
      
  peticiones : Peticion[] = [];
  mine : boolean = false;
    
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(private peticonService: PeticionService,
    private route: ActivatedRoute,
    private router: Router) { }
  
  /**
   * Write code on Method
   *
   * @return response()
   */
  ngOnInit(): void {

    this.mine = (this.route.snapshot.routeConfig?.path?.toString() == 'mine') ? true : false;
 
    if(this.mine){
      this.peticonService.getAllUser().subscribe( listPeticiones => {this.peticiones = listPeticiones;  });
    }
    else{
      this.peticonService.getAll().subscribe( listPeticiones => {this.peticiones = listPeticiones;  });
    }

  }
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  deletePeticion(id:Number){
    this.peticonService.delete(id).subscribe(res => {
         this.peticiones = this.peticiones.filter(item => item.id !== id);
    })
  }
    
}