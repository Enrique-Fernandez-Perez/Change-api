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
                <form method="POST" action="{{route('canal.store')}}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <div class="col-md-8">
                            <label for="validationServer01" class="form-label">Nombre Del Canal</label>
                            <input type="text" name="nombre" class="form-control  @error('nombre') is-invalid @enderror" id="validationServer01" >
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <input value="Crear Canal" type="submit"
                                   class="btn btn-primary">
                        </div>
                    </div>
                </form>


            </div>  </div>  </div>

@endsection
