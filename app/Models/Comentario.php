<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'comentario',
    ];

    public function user(){
        return$this->belongsTo("App\Models\User");
    }

    public function video(){
        return $this->belongsTo('App\Models\Video');
    }

    public function toString()
    {
        return $this->comentario;
    }
}
