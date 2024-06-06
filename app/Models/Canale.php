<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canale extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'user_id',
    ];

    public function user(){
        return$this->hasOne("App\Models\User");
    }

    public function videos(){
        return $this->hasMany('App\Models\Video');
    }
}
