<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresos;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
     public function index()
     {
         // Obtener todos los ingresos desde la base de datos
       
     
         // Obtener la información adicional de vehículos, marcas y clientes
         $ingresos = Ingresos::select('ingresos.*', 'vehiculos.numeroplaca','vehiculos.modelo', 'marcas.nombre as nombre_marca')
             ->join('vehiculos', 'ingresos.idvehiculo', '=', 'vehiculos.idvehiculo') // Ajusta el nombre de la columna aquí
             ->join('marcas', 'vehiculos.idmarca', '=', 'marcas.idmarca') // Ajusta el nombre de la columna aquí
             ->get();
     
         // Fusionar los resultados de ingresos con la información adicional
         //$ingresos = $ingresos->merge($infoAdicional);
     
         // Pasar los ingresos fusionados a la vista
         return view('ingresos.index', compact('ingresos'));
     }
     
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingresos.create');
    }

    public function store(Request $request)
    {
        // Valida y almacena la información de ingresos$ingresos en la base de datos
        $ingresos = new Ingresos();
        $ingresos->fechahoraingreso = $request->input('fechahoraingreso');
        $ingresos->fechahorasalida = $request->input('fechahorasalida');
        $ingresos->save();

        // Redirecciona a la página de listado de ingresos u otra vista
        return redirect()->route('ingresos.index');
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
    public function edit($id)
    {
        // Obtener el ingreso que se desea editar por su ID y pasar a la vista
        $ingreso = Ingresos::where('idingreso', $id)->first();
        
        if (!$ingreso) {
            return abort(404); // Otra acción apropiada para manejar el caso en que no se encuentra el registro.
        }
        
        return view('ingresos.edit', ['ingreso' => $ingreso]);
    }
    
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'fechahoraingreso' => 'required|date',
            'fechahorasalida' => 'required|date',
        ]);
        
        // Buscar el ingreso por su ID y actualizar los datos
        $ingreso = Ingresos::where('idingreso', $id)->first();
        
        if (!$ingreso) {
            return abort(404); // Manejo adecuado si no se encuentra el registro.
        }
        
        $ingreso->fechahoraingreso = $request->input('fechahoraingreso');
        $ingreso->fechahorasalida = $request->input('fechahorasalida');
        
        
        // Redireccionar a la vista de detalles o a donde lo necesites
        return redirect()->route('ingresos.index', $ingreso->idingreso);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
     
    }

  
}


