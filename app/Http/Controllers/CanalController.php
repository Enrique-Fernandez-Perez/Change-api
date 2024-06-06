<?php

namespace App\Http\Controllers;

use App\Models\Canale;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class CanalController extends Controller
{
    //
    public function show(Request $request)
    {
        $user = Auth::user();

        try{
            $exit = $user->canale;
            if(!$exit){
                return redirect(route('canal.create'));
            }

            $canal = $user->canale;
            $videos = Video::where('canal_id',$canal->id)->simplePaginate(5);
        }
        catch (Exception $e){
//            return back()->withError($e->getMessage())->withInput();
            return redirect('home');
        }
        return view('canales.show', compact('videos'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $existe = Canale::where('user_id',$user->id)->firstOrFail();
        if(!is_null($existe)){
            return redirect(route('canal.show'));
        }
        return view('canales.edit-add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);
        $input = $request->all();
        try {
            $user = Auth::user(); //asociarlo al usuario authenticado

            $canal = new Canale();
            $canal->nombre = $request->get('nombre');
            $canal->user_id = $user->id;
            $canal->save();
            return redirect(route('canal.show'));
        }
        catch (\Exception $exception){
            return back()-> withError($exception-> getMessage())-> withInput();
        }
    }
}
