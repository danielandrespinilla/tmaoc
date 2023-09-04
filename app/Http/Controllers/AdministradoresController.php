<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cantidadadministradores = Administradores::where('user_id', '=', $id)->count();
        
        if ($cantidadadministradores > 0) {
            $administradores = Administradores::where('user_id', '=', $id)->get();
            return view('administrador.actualizar', ['administradores' => $administradores])->with('emp', $cantidadadministradores);
        } else {
            return view('administrador.actualizar')->with('emp', $cantidadadministradores);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cantidadadministradores = Administradores::where('user_id', '=', $id)->count();
        
        if ($cantidadadministradores > 0) {
            $administradores = Administradores::where('user_id', '=', $id);
            $administradores->update([
                'user_id' => request('codigo'),
                'nombre' => request('nombre'),
                'apellido' => request('apellido'),
                'telefono' => request('telefono'),
                'numerodocumento' => request('numerodocumento'),
                'email' => request('email'),
                'tipo' => request('tipo')
            ]);
        } else {
            Administradores::create([
                'user_id' => request('codigo'),
                'nombre' => request('nombre'),
                'apellido' => request('apellido'),
                'telefono' => request('telefono'),
                'numerodocumento' => request('numerodocumento'),
                'email' => request('email'),
                'tipo' => request('tipo')
            ]);
        }
        return redirect()->route('home');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
