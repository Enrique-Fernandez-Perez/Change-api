@extends('layouts.public')
@section('content')

<div class="container-fluid mx-auto">
    <?php
        //esto determinara la altura y la anchura que ocupara la imagen/video en su posicion, este tamoño es optiomo para un numero de columnas inferior a 6,
        //si subes el numero de columnas a 6 o mas habra que modificar esta variable para que la imagen se vea correctamene. (recomeindo partir de 350/300 y 4/5 columnas, e ir bajar de 50 en 50, hasta un maximo de 200 con 8 columnas
        $tam = 300;
    ?>
    <!-- Filas con títulos y descripciones -->
    <div class='row mt-3 mx-auto'>
    @foreach($videos as $video)
            <div class='col mx-auto'>
                <a class='link-dark link-underline-opacity-0' href='{{route('video.show', $video->id)}}'>
                    <video id='{{$video->id}}' width='<?= $tam ?>px' height='<?= $tam ?> px' loop buffered controls onmouseover='playPause(this)' onmouseout='playPause(this)' autoplay>
                        <source src='{{asset( $video->files()->first()->file_path)}}' type='video/mp4'>
                    </video>
                    <h2>{{$video->titulo}}</h2>
                    <h5>{{$video->descripcion}}</h5>
                </a>
                <div class="d-flex mx-auto">
{{--                    <form class="mx-3" method="put" action="{{route('video.edit', $video->id)}}">--}}
{{--                        <button type="submit">Editar Videoe</button>--}}
{{--                    </form>--}}

{{--                    <form method="delete" action="{{route('video.delete', $video->id)}}">--}}
{{--                        <button type="submit">Borrar Videoe</button>--}}
{{--                    </form>--}}

                    <form class="mx-3" method="put" action="{{route('video.edit', $video->id)}}">
                        <button type="submit">Editar Videoe</button>
                    </form>

                    <form method="POST" action="{{route('video.delete', $video->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar Videoe</button>
                    </form>

                </div>

            </div>

    @endforeach

    </div>

    <div id="paginacion" class="d-flex align-bottom justify-content-center relative inline-flex items-center mt-4">
        {{$videos->links()}}
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
