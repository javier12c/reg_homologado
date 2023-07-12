<?php

namespace App\Http\Controllers;

use App\Models\Cat_expediente;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $cat_expedientes = Cat_expediente::all(); // Obtén el modelo que deseas pasar

        view()->share('cat_expedientes', $cat_expedientes);
    }
}
