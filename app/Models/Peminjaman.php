<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $table='peminjaman';
    
    public function barang()
    {
    	return $this->belongsTo(Barang::class);
    }

    public function driver()
    {
    	return $this->belongsTo(Driver::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
