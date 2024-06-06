<?php

namespace App\Http\Controllers;

use Cassandra\Map;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Ramsey\Collection\Set;
use Ramsey\Uuid\Type\Integer;

class PagesController extends Controller
{
    //
    public function home(Request $request)
    {
        $videos = (new VideosRandom())->getVideos(10);
        return view('pages.home', compact('videos'));
    }

     public function search(Request $request, $search){
//    public function search(Request $request){
            // str_replace("'",'"',$search);//remplazara las comillas simples ' por comillas doble " del contenido de $search
        // $search = $search;

        // return view('pages.search');
        // return view('pages.search', compact('videos'));
    }
}
