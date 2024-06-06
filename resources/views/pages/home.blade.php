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
            </div>

    @endforeach

    </div>

{{--    <div id="paginacion" class="relative inline-flex items-center col-3 row-1 mt-4">--}}
{{--        {{ $videos->links()}}--}}
{{--    </div>--}}



{{--    <?php--}}
{{--    $ids = [];--}}
{{--    $src = [];--}}

{{--    $videos = \App\Models\Video::all();--}}
{{--    foreach($videos as $option => $video){--}}
{{--        $ids[] = $video->id;--}}
{{--        $src[] = $video->files()->first()->file_path;--}}
{{--    }--}}

{{--    @foreach($video as $videos)--}}
{{--        $ids[] = $video->id;--}}
{{--        $src[] = $video->files()->first()->file_path;--}}
{{--    @endforeach--}}

{{--        $rows=2;--}}
{{--        $columnas=5;--}}

{{--        $vid=1;--}}

{{--        //esto determinara la altura y la anchura que ocupara la imagen/video en su posicion, este tamoño es optiomo para un numero de columnas inferior a 6,--}}
{{--        //si subes el numero de columnas a 6 o mas habra que modificar esta variable para que la imagen se vea correctamene. (recomeindo partir de 350/300 y 4/5 columnas, e ir bajar de 50 en 50, hasta un maximo de 200 con 8 columnas--}}
{{--        $tam = 300;--}}

{{--        for($row=0; $row < $rows; $row++){--}}
{{--            echo "<div class='row mt-3 mx-auto'>";--}}

{{--            for($col=0; $col < $columnas; $col++){--}}
{{--                echo "<div class='col mx-auto'>--}}
{{--                <a class='link-dark link-underline-opacity-0' href='video.html'>--}}
{{--                <video id='' width='" . $tam . "' height='" . $tam . "' loop buffered controls onmouseover='playPause(this)' onmouseout='playPause(this)' autoplay>--}}
{{--                    <source src='https://www.w3schools.com/html/mov_bbb.ogg' type='video/mp4'>--}}
{{--                    </video>--}}
{{--                    <h2>Título " . $vid . " </h2>--}}
{{--                    <h5>Descripción " . $vid . " ...</h5></a>--}}
{{--                    </div>";--}}
{{--                $vid++;--}}
{{--            }--}}

{{--            echo "</div>";--}}
{{--        }--}}
{{--    ?>--}}

{{--</div>--}}

 <script>

function playPause(myVideo) {
  if (myVideo.paused)
    myVideo.play();
  else
    myVideo.pause();
}

</script>


@endsection
