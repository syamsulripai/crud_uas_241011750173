<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileApp extends Model
{
    protected $fillable = [

        'gambar',
        'nama_aplikasi',
        'developer',
        'versi',
        'deskripsi'

    ];
}