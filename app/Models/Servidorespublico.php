<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidorespublico extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_nombre',
        'emp_apellido',
        'emp_correo',
        'emp_fkdepedencia',
        'emp_puesto',
    ];
    public function dependencia()
    {
        return $this->belongsTo(Cat_unidadependencia::class, 'emp_fkdepedencia', 'dep_id');
    }
}
