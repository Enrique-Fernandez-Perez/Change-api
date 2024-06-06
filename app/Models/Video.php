<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'canal_id',
        'apto_menores',
    ];

//    public function comentarios()
//    {
////        return $this->belongsToMany("App\Models\User", "user_video");
//        return $this->belongsToMany("App\Models\User")->withTimestamps();
//    }

    public function canale()
    {
        return $this->belongsTo("App\Models\Canale");
    }

    public function files(){
        return $this->hasMany("App\Models\File");
    }

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario');
    }
}
