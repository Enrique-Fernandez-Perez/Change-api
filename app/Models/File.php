<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'file_path',
        'video_id',
    ];

    public function video(){
        return$this->belongsTo(Video::class);
    }
}
