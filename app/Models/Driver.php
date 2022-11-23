<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded =['id'];
    protected $fillable = [
        'namaDriver',
        'Rating',
        'status',
        'is_active',
    ];
}
