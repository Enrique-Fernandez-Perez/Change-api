<?php

namespace App\Http\Controllers;

use App\Models\Canale;
use App\Models\File;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class VideoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show']]);
    }

    public function show(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        try{
            if($video->apto_menores != true){
                $motivo = '';
                if(Auth::check()){
                    $user = Auth::user();

                    if($this->comprobarEdad($user->fech_nacimiento)) {
                        $motivo = 'no es apto para tu edad';
//                        return view('videos.show_noapto', compact('motivo'));
                        return response()->json(['no apto para menores'.$motivo, 600]);
                    }
                }
                else{
                    $motivo = 'es necesario iniciar sesion';
//                    return view('videos.show_noapto', compact('motivo'));
                    return response()->json(['no apto para menores'.$motivo, 600]);
                }
            }
        }
        catch (\Exception $exception){
//            return back()->withError( $exception->getMessage())->withInput();
//            return redirect('login');
        }
        $videos = (new VideosRandom())->getVideos(5);

//        return view('videos.show', compact('video', 'videos'));
        return response()->json([$videos, 200]);
    }

    public function comprobarEdad($nac){
        if ((date( 'Y', strtotime( 'today' )) - date( 'Y', strtotime($nac))) > 17){
            if(date( 'm', strtotime( 'today' )) == date( 'm', strtotime($nac))){
                if(date( 'd', strtotime( 'today' )) >= date( 'd', strtotime($nac))){
                    return true;
                }
            }
            if(date( 'm', strtotime( 'today' )) > date( 'm', strtotime($nac))){
                return true;
            }
        }
        return false;
    }

    public function edit(Request $request, $id=0)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    public function delete(Request $request, $id=0)
    {
        Video::destroy($id);
        return redirect('canal');
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $canal = Canale::where('user_id', $user->id)->First();
        if(!$canal){
            return redirect('canal/add');
        }
        return view('videos.edit-add');
    }

    public function update(Request $request, $id=0){
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
        ]);
        $input = $request->all();

        try {
//            $id = $request->route()->parameters()['id'];

            $video = Video::findOrFail($id);

            $titulo = $request->get('titulo');
            $descripcion = $request->get('descripcion');

            if(is_null($titulo)){
                $titulo = $video->titulo;
            }

            if(is_null($descripcion)){
                $descripcion = $video->descripcion;
            }

            $video->titulo = $titulo;
            $video->descripcion = $descripcion;

            $video->apto_menores = false;

            if(!$request->get('menores') == null){
                $video->apto_menores = true;
            }

            $res = $video-> save();
            return redirect('/video/'. $id);
        }
        catch (\Exception $exception){
//            return back()-> withError($exception-> getMessage())-> withInput();
            return redirect('canal');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'file' => 'required|mimetypes:video/*',
        ]);
        $input = $request->all();
        try {
            $user = Auth::user(); //asociarlo al usuario authenticado
            $video = new Video($input);

            $canal = Canale::where('user_id', $user->id)->First();

            $video->canal_id = $canal->id;

            $video->apto_menores = false;

            if(!$request->get('menores') == null){
                $video->apto_menores = true;
            }
            $res = $video-> save();
            if ($res) {
                $vid = $video->id;
                $res_file = $this->fileUpload($request, $vid);
                if ($res_file) {
                    return redirect('/video/'. $vid);
                }
                return back()-> withError('Error creando la peticion')-> withInput();
            }
        }
        catch (\Exception $exception){
            return back()-> withError($exception-> getMessage())-> withInput();
        }
    }

    public function fileUpload(Request $req, $video_id = null)
    {
        $file = $req->file('file');
        $fileModel = new File;
        $fileModel->video_id = $video_id;
        if ($req->file('file')) {
            $filename = $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('videos', $filename);
            $fileModel->name = $filename;
            $fileModel->file_path = "videos/" . $filename;
            $res = $fileModel->save();
            return $fileModel;
            if ($res) {
                return 0;
            } else {
                return 1;
            }
        }
        return 1;
    }
}
