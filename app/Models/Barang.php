<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $fillable = [
        'kodeKendaraan',
        'namaKendaraan',
        'merkKendaraan',
        'jumlah',
        'kondisi',
    ];
    // public function peminjaman()
    // {
    // 	return $this->belongsToMany('App\Peminjaman');
    // }
}

