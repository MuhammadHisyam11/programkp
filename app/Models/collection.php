<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'dosen_id',
        'waktu'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function day(){
        return $this->belongsTo(day::class);
    }

    public function dosen(){
        return $this->belongsTo(dosen::class);
    }

    public function lesson(){
        return $this->belongsTo(lesson::class);
    }
}
