<?php

namespace App\Http\Controllers;

use App\Models\Canale;
use App\Models\Comentario;
use App\Models\File;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class ComentarioController extends Controller
{
    //
    public function create(Request $request, $id=0)
    {
        $video = Video::findOrFail($id);
        return view('comentarios.edit-add', compact('video'));
    }

    public function store(Request $request, $id=0)
    {
        try {
            $user = Auth::user(); //asociarlo al usuario authenticado
            $video = Video::findOrFail($id);

            $comentario = new Comentario();
            $comentario->comentario = $request->all()['comentario'];

//            $comentario->video()->associate($video);
//            $comentario->user()->associate($user);

            $video->comentarios()->associate($comentario);
            $user->comentarios()->associate($user);

            $comentario->save();
            return redirect('/video/'. $id);
        }
        catch (\Exception $exception){
            return back()-> withError($exception-> getMessage())-> withInput();
        }
    }

}
