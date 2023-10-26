<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Models\Vehiculos;
use App\Models\Revisiones;
use App\Models\Ingresos;
use App\Models\Marcas;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Utiliza Eloquent para realizar una consulta que involucre JOINs y relaciones
        $revisiones = Revisiones::join('vehiculos', 'revisiones.idvehiculo', '=', 'vehiculos.idvehiculo')
            ->join('marcas', 'vehiculos.idmarca', '=', 'marcas.idmarca')
            ->select('revisiones.idrevision', 'revisiones.idingreso', 'revisiones.idvehiculo', 'vehiculos.numeroplaca', 'vehiculos.modelo', 'marcas.nombre as marca_nombre', 'revisiones.costo', 'revisiones.fecharevision', 'revisiones.estado', 'revisiones.cuandihizotcnmecanica')
            ->get();
    
        return view('revisiones.index', compact('revisiones'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera la lista de vehículos y marcas que se mostrarán en el formulario
        $vehiculos = Vehiculos::all();
        $marcas = Marcas::all();
    
        return view('revisiones.create', compact('vehiculos', 'marcas'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'idingreso' => 'required|integer',
            'idvehiculo' => 'required|integer',
            'costo' => 'required|numeric',
            'fecharevision' => 'required|date',
            'estado' => 'required|string',
            'cuandihizotcnmecanica' => 'required|date',
        ]);
    
        // Crear una nueva instancia de Revision y asignar los valores del formulario
        $revision = new Revisiones();
        $revision->idingreso = $request->input('idingreso');
        $revision->idvehiculo = $request->input('idvehiculo');
        $revision->costo = $request->input('costo');
        $revision->fecharevision = $request->input('fecharevision');
        $revision->estado = $request->input('estado');
        $revision->cuandihizotcnmecanica = $request->input('cuandihizotcnmecanica');
    
        // Guardar la revisión en la base de datos
        $revision->save();
    
        // Redirigir a la página de listado de revisiones o a donde desees
        return redirect()->route('revisiones.index')->with('success', 'Revisión creada exitosamente.');
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
        // Buscar la revisión que se va a editar por su ID
        $revision = Revisiones::where('idrevision', $id)->first();
    
        if (!$revision) {
            // Puedes manejar la situación en la que la revisión no se encuentre
            // Puedes redirigir, mostrar un mensaje de error, etc.
            return redirect()->route('revisiones.index')->with('error', 'La revisión no se encontró.');
        }
    
        // Obtener la lista de vehículos y marcas para usar en el formulario
        $vehiculos = Vehiculos::all();
        $marcas = Marcas::all();
    
        return view('revisiones.edit', compact('revision', 'vehiculos', 'marcas'));
    }

   

    public function generateReport($id)
    {
        $revision = Revisiones::join('vehiculos', 'revisiones.idvehiculo', '=', 'vehiculos.idvehiculo')
            ->select('revisiones.estado', 'revisiones.cuandihizotcnmecanica', 'vehiculos.numeroplaca')
            ->where('revisiones.idrevision', $id)
            ->first();
    
        if (!$revision) {
            return redirect()->route('revisiones.index')->with('error', 'La revisión no se encontró.');
        }
    
        $data = [
            'numeroplaca' => $revision->numeroplaca,
            'estado' => $revision->estado,
            'cuandihizotcnmecanica' => $revision->cuandihizotcnmecanica,
        ];
    
        // En lugar de cargar 'revisiones.index', carga la vista de reporte
        $pdf = PDF::loadView('revisiones.reporte', $data);
    
        return $pdf->stream('reporte.pdf');
    }
    
    
        
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'idingreso' => 'required|integer',
            'idvehiculo' => 'required|integer',
            'numeroplaca' => 'required|string',
            'modelo' => 'required|string',
            'nombre_marca' => 'required|string',
            'costo' => 'required|numeric',
            'fecharevision' => 'required|date',
            'estado' => 'required|string',
            'cuandihizotcnmecanica' => 'required|date',
        ]);
        $vehiculo = new Vehiculos();
        $vehiculo->numeroplaca = $request->input('numeroplaca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->save();
    
        // Luego, crea un nuevo registro en la tabla "marcas"
        $marca = new Marcas();
        $marca->nombre = $request->input('nombre_marca');
        $marca->save();

    
        // Buscar la revisión que se va a actualizar por su ID
        $revision = Revisiones::findOrFail($id);
    
        if (!$revision) {
            return redirect()->route('revisiones.index')->with('error', 'La revisión no se encontró.');
        }
    
        // Actualizar los campos de la revisión
        $revision->idingreso = $request->input('idingreso');
        $revision->idvehiculo = $request->input('idvehiculo');
        $revision->costo = $request->input('costo');
        $revision->fecharevision = $request->input('fecharevision');
        $revision->estado = $request->input('estado');
        $revision->cuandihizotcnmecanica = $request->input('cuandihizotcnmecanica');
    
        // Guardar los cambios en la base de datos
        $revision->save();
    
        return redirect()->route('revisiones.index')->with('success', 'Revisión actualizada exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
