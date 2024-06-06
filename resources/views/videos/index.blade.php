@extends('layouts.public')
@section('content')

    <div class="container-fluid mx-auto">
        <div class='row mt-3 mx-auto'>
        <span class="align-middle mx-auto mt-3">
            <form class="form-inline align-bottom justify-content-center mx-auto" method="post  ">
                <label class="mx-2" >Selecciona el numero de viedos que se veran por pagina:</label>
                <select name="numVideos" id="numVideos">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15" >15</option>
                    <option value="20">20</option>
                </select>
                <button class="mx-2" type="submit"> Confirmar numero</button>
            </form>
        </span>
        </div>

            <!-- Filas con títulos y descripciones -->
        <div class='row mt-3 mx-auto'>
            @foreach($videos as $video)
                <div class='col mx-auto'>
                    <a class='link-dark link-underline-opacity-0' href='{{route('video.show', $video->id)}}'>
                        <video id='{{$video->id}}' width='300px' height='300px' loop buffered controls onmouseover='playPause(this)' onmouseout='playPause(this)' autoplay>
                            <source src='{{asset( $video->files()->first()->file_path)}}' type='video/mp4'>
                        </video>
                        <h2>{{$video->titulo}}</h2>
                        <h5>{{$video->descripcion}}</h5>
                    </a>
                </div>

            @endforeach

        </div>

        <div id="paginacion" class="relative inline-flex items-center col-3 row-1 mt-4">
            <!-- { $peticiones->links()}} -->
        </div>

        <script>

            function playPause(myVideo) {
                if (myVideo.paused)
                    myVideo.play();
                else
                    myVideo.pause();
            }

        </script>


@endsection
