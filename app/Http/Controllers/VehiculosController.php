<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route as IlluminateRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehiculos;
use App\Models\Revisiones;
use PDF;

class VehiculosController extends Controller
{
        public function index()
        {
            $vehiculos = Vehiculos::join('marcas', 'vehiculos.idmarca', '=', 'marcas.idmarca')
                ->join('ciudades', 'vehiculos.idciudad', '=', 'ciudades.idciudad')
                ->join('departamentos', 'vehiculos.iddepartamento', '=', 'departamentos.iddepartamento')
                ->select('vehiculos.idvehiculo', 'vehiculos.numeroplaca', 'vehiculos.modelo', 'marcas.nombre as marca_nombre', 'ciudades.nombre as ciudad_nombre', 'departamentos.nombre as departamento_nombre')
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
        
            // Almacena los datos en una sesión para que estén disponibles en la siguiente vista
            $reporteData = [
                'numeroplaca' => $numeroplaca,
                'titulo' => $titulo,
                'observaciones' => $observaciones,
                'firma' => $firma,
                'fechaActual' => $fechaActual,
            ];
        
            $request->session()->put('reporteData', $reporteData);
        
            // Redirige a la vista de creación del reporte
            return redirect()->route('vehiculos.create', ['numeroplaca' => $numeroplaca]);
        }
        
        public function downloadPDF(Request $request)
        {
            // Obtén los datos almacenados en la sesión
            $reporteData = $request->session()->get('reporteData');
        
            // Agrega el autor (siempre está presente) al array de datos
            $reporteData['autor'] = 'DANIEL ANDRES PINILLA';
        
            // Generar el PDF
            $pdf = PDF::loadView('vehiculos.reporte', $reporteData);
        
            // Establecer el nombre del archivo PDF para la descarga
            $pdfFileName = 'reporte_' . $reporteData['numeroplaca'] . '.pdf';
        
            // Descargar el PDF directamente
            return $pdf->download($pdfFileName);
        }
        
        public function create($numeroplaca)
        {
            $reporteData = session('reporteData');
        
            if (!$reporteData) {
                return redirect()->route('vehiculos.index')->with('error', 'Los datos del reporte no están disponibles.');
            }
        
            $vehiculo = Vehiculos::where('numeroplaca', $numeroplaca)->first();
        
            if (!$vehiculo) {
                return redirect()->route('vehiculos.index')->with('error', 'El vehículo no se encontró.');
            }
        
            $titulo = $reporteData['titulo'] ?? ''; // Obtener el título del reporte
            $observaciones = $reporteData['observaciones'] ?? ''; // Obtener las observaciones del reporte
            $firma = $reporteData['firma'] ?? ''; // Obtener la firma del reporte
        
            return view('vehiculos.create', compact('numeroplaca', 'vehiculo', 'reporteData', 'titulo', 'observaciones', 'firma'));
        }

        public function search(Request $request)
        {
            // Obtener el término de búsqueda del formulario
            $term = $request->input('search');

            // Realizar la búsqueda en la tabla de vehículos
            $vehiculos = Vehiculos::where('numeroplaca', 'LIKE', "%$term%")
                ->orWhere('modelo', 'LIKE', "%$term%")
                ->orderBy('numeroplaca', 'ASC') // Puedes ordenar los resultados según tus preferencias
                ->get();

            // Pasar los resultados de la búsqueda a la vista
            return view('vehiculos.index', ['vehiculos' => $vehiculos]);
        }



   

      

    

    // Resto de los métodos del controlador



        public function store(Request $request)
        {
        }

        public function show(string $id)
        {
         
        }

        public function edit(string $id)
        {
            // Puedes agregar la lógica para editar un reporte específico si es necesario
        }

        public function update(Request $request, string $id)
        {
            // Puedes agregar la lógica para actualizar un reporte específico si es necesario
        }

        public function destroy(string $id)
        {
            // Puedes agregar la lógica para eliminar un reporte específico si es necesario
        }
}
