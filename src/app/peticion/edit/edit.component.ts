import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormControl, Validators} from '@angular/forms';
import { PeticionService } from '../peticion.service';
import { Categoria, Peticion } from '../peticion';
     
@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})
export class EditComponent implements OnInit {
      
  id!: number;
  peticion!: Peticion;
  form!: FormGroup;

  // categorias !: Categoria[];
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(
    public peticionService: PeticionService,
    private route: ActivatedRoute,
    private router: Router
  ) {
   
   }
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  ngOnInit(): void {
    this.id = this.route.snapshot.params['Id'];
    this.peticionService.find(this.id).subscribe((data: Peticion)=>{
      this.peticion = data;
    }); 
      
    this.form = new FormGroup({
      titulo: new FormControl(this.peticion.descripcion, [Validators.required]),
      descripcion: new FormControl(this.peticion.descripcion, Validators.required),
      destinatario: new FormControl(this.peticion.destinatario, [Validators.required]),
      categoria_id: new FormControl(this.peticion.categoria_id, Validators.required),
    });
  }
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  get f(){
    return this.form.controls;
  }
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  submit(){
    console.log(this.form.value);
    this.peticionService.update(this.id, this.form.value).subscribe((res:any) => {
         this.router.navigateByUrl('');
    })
  }
   
}