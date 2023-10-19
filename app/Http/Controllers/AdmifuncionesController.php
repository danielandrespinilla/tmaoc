<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Ciudades;
use App\Models\Departamentos;

class AdmifuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Realiza un join con las tablas ciudades y departamentos utilizando alias
        $clientes = Clientes::join('ciudades as c', 'clientes.idciudad', '=', 'c.idciudad')
            ->join('departamentos as d', 'c.iddepartamento', '=', 'd.iddepartamento')
            ->orderBy('clientes.nombre', 'ASC')
            ->get([
                'clientes.*', // Esto seleccionará todos los campos de la tabla clientes
                'c.nombre as ciudad_nombre', // Alias para el nombre de ciudad
                'd.nombre as departamento_nombre' // Alias para el nombre de departamento
            ]);

        return view('admifunciones/index', compact('clientes'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamentos::orderBy('nombre', 'ASC')->get();
        return view('admifunciones.create', ['departamentos' => $departamentos]);
    }

    public function consultarCiudades( $id)
    {
       
        $ciudades = Ciudades::where('iddepartamento', $id)->orderBy('nombre', 'ASC')->get();
        return ($ciudades);
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
            'idciudad'=> $request['ciudad'],
            'iddepartamento'=> $request['depto']
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
        

        $clientes = Clientes::where('idcliente', '=', $id)->get();
        return view('admifunciones/edit',['clientes'=>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
  
     public function update(Request $request, $id)
     {
       
         $request->validate([
             'nombre' => 'required|string',
             'apellido' => 'required|string',
             'numerodocumento' => 'required|string',
         ]);
     
         // Actualiza el cliente en la base de datos
         Clientes::where('idcliente', $id)->update([
             'nombre' => $request->input('nombre'),
             'apellido' => $request->input('apellido'),
             'numerodocumento' => $request->input('numerodocumento'),
         ]);
     
         
         return redirect()->route('admifunciones.index');
     }
  
    
    
    
    

         /*
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el cliente por su ID

    }
    public function desactivarCliente(string $idcliente)
    {
        Clientes::where('idcliente', $idcliente)->update([
            'activo' => "0"
        ]);
        
        return redirect()->route('admifunciones.index'); 
    }    
    
 
    

    public function search(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $term = $request->input('search');
    
        // Realizar la búsqueda en la tabla de clientes
        $clientes = Clientes::where('nombre', 'LIKE', "%$term%")
            ->orWhere('apellido', 'LIKE', "%$term%")
            ->orWhere('numerodocumento', 'LIKE', "%$term%")
            ->orderBy('nombre', 'ASC') // Puedes ordenar los resultados según tus preferencias
            ->get();
    
        // Pasar los resultados de la búsqueda a la vista
        return view('admifunciones.index', ['clientes' => $clientes]);
    }
    


       
    

   
    
    
}
