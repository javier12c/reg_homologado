<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'exp_nombre',
    ];
}
