<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideosRandom
{
    public function getVideos($numVideos=5){
        if($numVideos < 1){$numVideos=5;}
        $videos = [];
        $fin = $numVideos-1;
        for($i=0; $i < $numVideos; $i++){
            $video = $this->videoRandom();
            $videos[] = $video;

            if($i == $fin && count($videos) != $fin){
                $i = count($videos) - 1;
            }
        }
        return $videos;
    }

    public function videoRandom(): Video{
        try{
            $videos = Video::all();
            $id = rand(0,($videos->count()-1));
            $video = $videos[$id];
            return $video;
        }
        catch(\Exception $exc){
            $video = Video::all()->firstOrFail();
        }
        return $video;
    }
}
