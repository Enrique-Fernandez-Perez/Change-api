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
    <?php
        $listar = 5;//$_REQUEST['numVideos'];//$GLOBALS['numVideos'];//$_GET['numVideos'];

        $resVideos = 5;

        $ids = [];
        $src = [];

        // echo count($ids);

        if(count($ids) != 0){
            $listar = count($ids);//$_REQUEST['numVideos'];//$GLOBALS['numVideos'];//$_GET['numVideos'];
            $resVideos = count($ids);
        }

        // $rows = $listar/5;
        $rows = $listar/5;
        $columnas = 5;

        $vid=1;

        //esto determinara la altura y la anchura que ocupara la imagen/video en su posicion, este tamoño es optiomo para un numero de columnas inferior a 6,
        //si subes el numero de columnas a 6 o mas habra que modificar esta variable para que la imagen se vea correctamene. (recomeindo partir de 350/300 y 4/5 columnas, e ir bajar de 50 en 50, hasta un maximo de 200 con 8 columnas
        $tam = 300;



        for($row=0; $row < $rows; $row++){
            echo "<div class='row mt-1 mx-auto'>";
            // if($vid < count($ids)){
            //     echo "ids " . count($ids) . " v:  " . $vid;
            // }

            if($resVideos < 5){
                // echo $resVideos;
                $columnas = $resVideos;
            }

            for($col=0; $col < $columnas; $col++){
                    echo "<div class='col mx-auto'>
                    <a class='link-dark link-underline-opacity-0' href='video.html'>
                    <video id='video1' width='" . $tam . "' height='" . $tam . "' loop buffered controls onmouseover='playPause(this)' onmouseout='playPause(this)' autoplay>
                        <source src='https://www.w3schools.com/html/mov_bbb.mp4' type='video/mp4'>
                        </video>
                        <h2>Título " . $vid . " </h2>
                        <h5>Descripción " . $vid . " ...</h5></a>
                        </div>";
                    $vid++;
                    $resVideos--;
                    // if(count($ids) <  $vid){
                    //     // echo "</div>";
                    //     return;
                    // }
                }

                echo "</div>";
        }
    ?>

    <div id="paginacion" class="relative inline-flex items-center col-3 row-1 mt-4">
        <!-- { $peticiones->links()}} -->
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
