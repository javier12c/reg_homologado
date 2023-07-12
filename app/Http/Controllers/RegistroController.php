<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro.index');
    }

    public function show(Registro $registro)
    {
        return view('registro.show', [
            'registro' => $registro,
        ]);
    }
    public function edit(Registro $registro)
    {
        return view('registro.edit', [
            'registro' => $registro,
        ]);
    }
    //
}
