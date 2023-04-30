<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotel';
    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi', 
        'harga',
        'cekkamar',
    ];

    protected $hidden = [];
}
