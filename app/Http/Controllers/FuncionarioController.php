<?php

namespace App\Http\Controllers;

use App\Models\Servidorespublico;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    //
    public function show()
    {
        return view('funcionario.show');
    }
    public function edit(Servidorespublico $funcionario)
    {
        return view('funcionario.edit', [
            'funcionario' => $funcionario
        ]);
    }
}
