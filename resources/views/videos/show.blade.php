@extends('layouts.public')
@section('content')

    <?php
    //esto determinara la altura y la anchura que ocupara la imagen/video en su posicion, este tamoño es optiomo para un numero de columnas inferior a 6,
    //si subes el numero de columnas a 6 o mas habra que modificar esta variable para que la imagen se vea correctamene. (recomeindo partir de 350/300 y 4/5 columnas, e ir bajar de 50 en 50, hasta un maximo de 200 con 8 columnas
    $width = 100;
//    $width = 650;
    $height = 300;
    ?>
        <!-- Filas con títulos y descripciones -->

    <div class='row mt-3 mb-3 mx-auto'>
        <div class='col-12 col-sm-8 mb-3 mt-3 mx-auto'>
            <video id='{{$video->id}}' width='<?= $width ?>%' loop onmouseover='playPause(this)' onmouseout='playPause(this)' controls autoplay>
{{--            <video id='{{$video->id}}' width='100%' loop onmouseover='playPause(this)' onmouseout='playPause(this)' controls autoplay>--}}
{{--            <video id='{{$video->id}}' width='<?= $width ?>rem' height='<?= $height ?> rem' loop  onmouseover='playPause(this)' onmouseout='playPause(this)' controls autoplay>--}}
                <source src='{{asset( $video->files()->first()->file_path)}}' type='video/mp4'>
            </video>
            <span class="d-flex justify-content-center">
                <h2>{{$video->titulo}}</h2>
            </span>
            <span class="d-flex justify-content-center">
                <h5>{{$video->descripcion}}</h5>
            </span>

            <hr style='opacity:100%; height:8px;background-color:red !important; color:red !important;'>
{{--            <h5> {{$video->comentarios}}</h5>--}}
{{--            <span class="d-flex justify-content-center">--}}
                <?php if($video->comentarios){ ?>
{{--                    <h5> {{$video->comentarios[0]->comentario}}</h5>--}}
{{--                    <h5> {{$video->comentarios[1]}}</h5>--}}

                    @foreach($video->comentarios as $coment)

                        <span class="d-flex justify-content-center mx-auto mt-3 mb-3 p-2">
                            <a href="mailto:{{$coment->user->email}}"><h5>{{$coment->user->email}}: </h5></a>
                        </span>
{{--                            <hr style='opacity:100%; height:2px;background-color:black !important; color:black !important;'>--}}
    {{--                        <hr style='height:8px;background-color:black !important; color:black !important;'>--}}
                        <span class="mx-auto mt-3 mb-3 p-2">
                            <h5>{{$coment->comentario}}</h5>
                        </span>
                        <hr style='opacity:50%; height:2px;background-color:grey !important; color:grey !important;'>


                    @endforeach
            <span class="d-flex justify-content-center">
            <a class='link-dark bg-danger text-white link-underline-opacity-0 ' href='{{route('comentario.create', $video->id)}}'>Crear comentario </a>
            </span>
                <?php } ?>

{{--            </span>--}}


        </div>

        <div class='col-12 col-sm-3 mx-auto'>
            @foreach($videos as $vid)
    {{--            <div class='row mt-3 mb-3 mx-auto'>--}}
    {{--                <div class='col-2 mx-auto'>--}}
            <div class="d-flex mt-2 mb-2 mx-auto p-2">
                        <a class='link-dark mt-2 mb-2 mx-auto p-2 link-underline-opacity-0' href='{{route('video.show', $vid->id)}}'>
                            <video id='{{$vid->id}}' width='250rem' height="150rem" loop onmouseover='playPause(this)' onmouseout='playPause(this)' controls>
                                {{--            <video id='{{$video->id}}' width='100%' loop onmouseover='playPause(this)' onmouseout='playPause(this)' controls autoplay>--}}
                                {{--            <video id='{{$video->id}}' width='<?= $width ?>rem' height='<?= $height ?> rem' loop  onmouseover='playPause(this)' onmouseout='playPause(this)' controls autoplay>--}}
                                <source src='{{asset( $vid->files()->first()->file_path)}}' type='video/mp4'>
                            </video>
                        </a>
    {{--                </div>--}}
    {{--                <div class='col-2 mx-auto'>--}}
                        <a class='link-dark mt-2 mb-2 mx-auto p-2 link-underline-opacity-0' href='{{route('video.show', $vid->id)}}'>
                            <span class="d-flex justify-content-center">
                                <h2>{{$vid->titulo}}</h2>
                            </span>
                            <span class="d-flex justify-content-center">
                                <h5>{{$vid->descripcion}}</h5>
                            </span>
                        </a>
    {{--                </div>--}}
    {{--            </div>--}}
            </div>
            @endforeach
        </div>

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
