@extends('layouts.public')
@section('content')
    <style>
        #crear,
        #crear *{
            font-family: Arial !important;
            font-weight: bold !important;
            font-size: 2rem ; /* !important; */
            text-align: center  ; /* !important; */
            position: relative ; /* !important; */
            padding: 1rem ; /* !important; */
            justify-self: center ; /* !important; */
            margin-right: auto !important;
            margin-left: auto;
            /*margin-top: 2rem ; !* !important; *!*/
            /*margin-bottom: 2rem ; !* !important; *!*/
            font-weight: bold ; /* !important; */
        }
    </style>
    <div class="container-fluid " id="crear">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col">
                <form method="post" action="{{route('video.update', $video->id)}}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-8">
                        <div class="col-md-8">
                            <label for="validationServer01" class="form-label">Titulo</label>
                            <input type="text" name="titulo" class="form-control  @error('titulo') is-invalid @enderror" id="validationServer01" >
                            @error('titulo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="validationServer01" class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="validationServer01" > </textarea>
                            @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input class="form-checkbox" type="checkbox" name="menores" />
                            <label class="form-label">Apto para menores de 18 años</label>
                        </div>

                        <div class="col-12">
                            <input value="Actualizar video" type="submit"
                                   class="btn btn-primary">
                        </div>
                    </div>
                </form>


            </div>  </div>  </div>

@endsection
