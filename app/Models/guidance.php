<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class guidance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'npm',
        'slug',
        'keperluan',
        'dosen_id',
        'waktu',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function day(){
        return $this->belongsTo(day::class);
    }

    public function dosen(){
        return $this->belongsTo(dosen::class);
    }
}
