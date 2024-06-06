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

    <?php if(\Illuminate\Support\Facades\Auth::check()){ ?>

    <div class="container-fluid " id="crear">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col">
                <form method="POST" action="{{route('comentario.store', $video->id)}}" enctype="multipart/form-data" class="row g-3">
                    @method('POST')
                    @csrf
                    <div class="col-md-8">
                        <div class="col-md-8">
                            <video id='{{$video->id}}' width='400px' controls>
                                <source src='{{asset( $video->files()->first()->file_path)}}' type='video/mp4'>
                            </video>                            <label for="validationServer01" class="form-label">Comentar el video {{$video->titulo}}</label>
                            <input type="text" name="comentario" class="form-control  @error('comentario') is-invalid @enderror" id="validationServer01" >
                            @error('comentario')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <input value="Crear Comentario" type="submit"
                                   class="btn btn-primary">
                        </div>
                    </div>
                </form>


            </div>  </div>  </div>
    <?php } else { ?>
        <h1 class="d-flex align-bottom justify-content-center text-danger mt-2 mb-2 mx-auto p-2">No puede comentar el video sin antes estar logueado</h1>
        <a href="{{route('video.show', $video->id)}}">
            Regresar al video
        </a>
        <a href="{{route('login')}}">
            Login para comentar cualquier video
        </a>
    <?php } ?>
@endsection
