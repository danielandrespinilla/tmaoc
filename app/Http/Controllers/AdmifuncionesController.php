<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class AdmifuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Clientes::orderBy('nombre','ASC')->get();
        return view('admifunciones/index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admifunciones/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Clientes::create([
            'nombre'=>$request['nombre'] ,
            'apellido' => $request['apellido'],
            'numerodocumento' => $request['numerodocumento'],
            /*Nombre del name del input*/
            ]);
            return redirect()->route('admifunciones.index');
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
        //        $cantidadclientes = Clientes::where('user_id', '=', $id)->count();

        $clientes = Clientes::where('idcliente', '=', $id)->get();
        return view('admifunciones/edit',['clientes' =>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar el clientes$clientes por su ID y obtener un modelo único
        $clientes = Clientes::where('idcliente','=', $id)->first();
    
        if ($clientes) {
            // Actualizar los campos del clientes$clientes y marcarlo como inactivo (desactivado)
            $clientes->nombre = $request['nombre'];
            $clientes->apellido = $request['apellido'];
            $clientes->numerodocumento = $request['numerodocumento'];
        // Cambiar el estado a inactivo (0 representa inactivo)
           
        }
    
        return redirect()->route('admifunciones.index');
    }
    
    
    

         /*
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el cliente por su ID
        $cliente = Clientes::where('idcliente', $id)->first();
        
        if ($cliente) {
            // Marcar el cliente como inactivo (0 representa inactivo)
            $cliente->activo = 0;
            dd($cliente);
        }
        
        return redirect()->route('admifunciones.index');
    }
    
    
 
    

    public function search(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $term = $request->input('search');

        // Realizar la búsqueda en la base de datos
        $clientes = Clientes::where('nombre', 'LIKE', "%$term%")
            ->orWhere('apellido', 'LIKE', "%$term%")
            ->orWhere('numerodocumento', 'LIKE', "%$term%")
            ->orderBy('nombre', 'ASC') // Puedes ordenar los resultados según tus preferencias
            ->get();

        // Pasar los resultados de la búsqueda a la vista
        return view('admifunciones.index', ['clientes' => $clientes]);
    }


       
    

   
    
    
}
