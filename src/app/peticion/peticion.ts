export interface Peticion {
    id: Number;
    titulo:string;
    descripcion:string;
    destinatario: string;
    firmantes : number;
    estado : ['aceptada', 'pendiente'];
    user_id : number;
    categoria_id : number;
    file:any;
}

export interface Categoria {
    id: Number;
    nombre:string;
}