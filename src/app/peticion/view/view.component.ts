import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Peticion } from '../peticion';
import { PeticionService } from '../peticion.service';
    
@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css']
})
export class ViewComponent implements OnInit {
     
  id!: number;
  peticion!: Peticion;
    
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(
    public peticionsService: PeticionService,
    private route: ActivatedRoute,
    private router: Router
   ) { }
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  ngOnInit(): void {
    this.id = this.route.snapshot.params['Id'];
        
    this.peticionsService.find(this.id).subscribe((data: Peticion)=>{
      this.peticion = data;
    });
  }
    

  firmar(id : Number){    
    this.peticionsService.firmar(id).subscribe((data: Peticion)=>{
      this.peticion = data;
    });
  }
  
  desfirmar(id : Number){
    this.peticionsService.find(this.id).subscribe((data: Peticion)=>{
      this.peticion = data;
    });
  }
}