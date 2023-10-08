<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Route as IlluminateRoute; // Cambia el alias de 'Route' a 'IlluminateRoute'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehiculos;
use App\Models\Revisiones;
use PDF;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $vehiculos = Vehiculos::join('marcas', 'vehiculos.idmarca', '=', 'marcas.idmarca')
             ->join('ciudades', 'vehiculos.idciudad', '=', 'ciudades.idciudad')
             ->join('departamentos', 'vehiculos.iddepartamento', '=', 'departamentos.iddepartamento')
             ->select('vehiculos.idvehiculo','vehiculos.numeroplaca', 'vehiculos.modelo', 'marcas.nombre as marca_nombre', 'ciudades.nombre as ciudad_nombre', 'departamentos.nombre as departamento_nombre')
             ->get();
     
         return view('vehiculos.index', compact('vehiculos'));
     }
     
     
     public function generarReporte(Request $request)
     {
         // Obtener los datos del formulario
         $numeroplaca = $request->input('numeroplaca');
         $titulo = $request->input('titulo');
         $observaciones = $request->input('observaciones');
         $firma = $request->input('firma');
         $fechaActual = now()->format('Y-m-d H:i:s');
     
         // Generar el PDF
         $pdf = PDF::loadView('vehiculos.reporte', compact('numeroplaca', 'titulo', 'observaciones', 'firma', 'fechaActual'));
     
         // Obtener el contenido del PDF
         $pdfContents = $pdf->output();
     
         // Guardar el contenido del PDF en la ubicación deseada
         Storage::disk('public')->put('temp/report.pdf', $pdfContents);
     
         // Devolver el enlace de descarga
         $pdfLink = asset('storage/temp/report.pdf');
     
         // Redirigir a la vista "create" con un mensaje de éxito y el enlace del PDF
         return redirect()->route('vehiculos.create', ['numeroplaca' => $numeroplaca, 'pdfLink' => $pdfLink])->with('success', 'Reporte generado exitosamente.');
     }

     
     
     
     
     

    
public function create($numeroplaca)
{
    $vehiculo = Vehiculos::where('numeroplaca', $numeroplaca)->first();

    if (!$vehiculo) {
        return redirect()->route('vehiculos.index')->with('error', 'El vehículo no se encontró.');
    }

    return view('vehiculos.create', compact('numeroplaca', 'vehiculo'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
