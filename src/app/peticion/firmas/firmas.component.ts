import { Component, OnInit } from '@angular/core';
import { Peticion } from '../peticion';
import { PeticionService } from '../peticion.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-firmas',
  templateUrl: './firmas.component.html',
  styles: [
  ]
})
export class FirmasComponent implements OnInit {
      
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
 
    this.peticonService.getFirmadas().subscribe( listPeticiones => {this.peticiones = listPeticiones;  });
  }
}
