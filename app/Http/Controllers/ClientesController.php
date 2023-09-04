<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clientes;


class ClientesController extends Controller
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
        $cantidadclientes = Clientes::where('user_id', '=', $id)->count();
        
        if ($cantidadclientes > 0) {
            $clientes = Clientes::where('user_id', '=', $id)->get();
            return view('cliente.actualizar', ['clientes' => $clientes])->with('emp', $cantidadclientes);
        } else {
            return view('cliente.actualizar')->with('emp', $cantidadclientes);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cantidadclientes = Clientes::where('user_id', '=', $id)->count();
        
        if ($cantidadclientes > 0) {
            $clientes = Clientes::where('user_id', '=', $id);
            $clientes->update([
                'user_id' => request('codigo'),
                'nombre' => request('nombre'),
                'apellido' => request('apellido'),
                'numerodocumento' => request('numerodocumento'),
                'email' => request('email')
            ]);
        } else {
            Clientes::create([
                'user_id' => request('codigo'),
                'nombre' => request('nombre'),
                'apellido' => request('apellido'),
                'numerodocumento' => request('numerodocumento'),
                'email' => request('email')
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
