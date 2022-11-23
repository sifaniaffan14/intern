<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintModel extends Model
{
    use HasFactory;
    public function peminjaman()
    {
    	return $this->belongsTo(Peminjaman::class);
    }
}
