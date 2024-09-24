<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'matkul',
        'day_id',
        'kelas',
        'dosen_id',
        'jam',
    ];

    public function day(){
        return $this->belongsTo(day::class);
    }

    public function dosen(){
        return $this->belongsTo(dosen::class);
    }
}
