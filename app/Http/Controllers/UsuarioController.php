<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Charts\Charts;
use App\Charts\Mostrar;
use App\Models\Registro;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cat_expediente;
use App\Models\Cat_unidadependencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;

class UsuarioController extends Controller
{
    //

    public function index(User $user, Cat_unidadependencia $cat_unidadependencia)
    {
        if (auth()->user()->rol === 1) {

            $user = User::find(auth()->user()->id); // Reemplaza '1' con el ID del usuario que deseas mostrar
            $registros = $user->registros()
                ->selectRaw('DATE(created_at) as fecha, COUNT(*) as total_registros')
                ->groupBy('fecha')
                ->orderBy('fecha')
                ->get();
            $fechas = $registros->pluck('fecha')->toArray();
            $cantidades = $registros->pluck('total_registros')->toArray();

            return view('usuario.show', [
                'user' => $user,
                'fechas' => $fechas,
                'cantidades' => $cantidades
            ]);
        } else {
            //Consulta de cuantos registros totales existen
            $registros = Registro::selectRaw('DATE(created_at) as fecha, COUNT(*) as total_registros')
                ->groupBy('fecha')
                ->orderBy('fecha')
                ->get();
            $fechas = $registros->pluck('fecha')->toArray();
            $cantidades = $registros->pluck('total_registros')->toArray();

            $usuariosRegistros = User::leftJoin('registros', 'users.id', '=', 'registros.reg_fkusuario')
                ->select('users.name', DB::raw('count(registros.id) as total'))
                ->groupBy('users.name')
                ->get();
            $expedientes = Cat_expediente::all();

            $data = [];
            foreach ($expedientes as $expediente) {
                $count = Registro::where('reg_fkexpediente', $expediente->exp_id)->count();
                $data[$expediente->exp_nombre] = $count;
            }

            $labels = array_keys($data);
            $values = array_values($data);

            return view('usuario.admin', [
                'user' => $user,
                'fechas' => $fechas,
                'cantidades' => $cantidades,
                'usuariosRegistros' => $usuariosRegistros,
                'labels' => $labels,
                'values' => $values

            ]);
        }
    }
    public function show(User $user)
    {
        // Obtén los datos de la base de datos
        return view('usuario.index', [
            'user' => $user
        ]);
    }
    public function create()
    {
        $cat_unidadepedencias = Cat_unidadependencia::all();

        return view('usuario.create', [
            'cat_unidadepedencias' => $cat_unidadepedencias,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'sexo' => 'required',
            'rol' => 'required',
            'dependencia' => 'required',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'telefono' => $request->telefono,
            'sexo' => $request->sexo,
            'rol' => $request->rol,
            'fkdepedencia' => $request->dependencia,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Creando mensaje
        session()->flash('mensaje', 'Se creo el usuario correctamente');

        //Redireccionando a la misma vista
        return redirect()->back();
    }
    public function shows()
    {
        return view('usuario.shows');
    }
    public function ver($usuarioId)
    {
        $user = User::find($usuarioId);
        return view('usuario.ver', [
            'user' => $user
        ]);
    }
}
