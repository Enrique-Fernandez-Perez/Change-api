import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators} from '@angular/forms';
import { PeticionService } from '../peticion.service';
import { AuthStateService } from 'src/app/shared/auth-state.service';
// import { Peticion, Categoria } from '../peticion';
     
@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {
    
  form!: FormGroup;

  imageSrc : string ='';
  selectedImage!: any;
  categorias : any = [];

  log ?: any;
  
  // categorias ?: Categoria[];
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(
    public peticionService: PeticionService,
    private router: Router,
    private authStatus : AuthStateService,
  ) { }

  /**
   * Write code on Method
   *
   * @return response()
   */
  ngOnInit(): void {
    this.form = new FormGroup({
      titulo: new FormControl('', [Validators.required]),
      descripcion: new FormControl('', Validators.required),
      destinatario: new FormControl('', [Validators.required]),
      categoria_id: new FormControl('', Validators.required),
      file: new FormControl('', Validators.required),
    });
    
    this.getLog();
    if(!this.log){
      this.router.navigateByUrl('login');
    }
  }

  getLog() {
    this.authStatus.userAuthState.subscribe(data => this.log = data);
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
  submit(form : FormGroup){
    // console.log(this.form.value);

    const formData = new FormData();
    
    formData.append('titulo',form.value.titulo);
    formData.append('descripcion',form.value.descripcion);
    formData.append('destinatario',form.value.destinatario);
    formData.append('categoria_id',form.value.categoria_id);
    formData.append('file', this.selectedImage);
    
    // console.log(formData);

    this.peticionService.create(formData).subscribe((res:any) => {
      this.router.navigateByUrl('peticiones/mine');
    })

    // this.peticionService.create(this.form.value).subscribe((res:any) => {
    //      this.router.navigateByUrl('');
    // })
  }
  
  onSelectFile(event : any){
    if(event.target.files.length > 0){
      const file = event.target.files[0];
      this.selectedImage = file;
    }
  }

}