<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $table = 'friends';
    protected $fillable = ['namabarang', 'stock', 'keterangan', 'tanggal'];
}
