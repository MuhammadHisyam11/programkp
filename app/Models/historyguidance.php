<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyguidance extends Model
{
    use HasFactory;
    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = [
        'user_id',
        'npm',
        'slug',
        'keperluan',
        'waktu',
        'dosen_id',
        'waktu',
        'keterangan',
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
}
