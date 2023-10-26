<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route as IlluminateRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehiculos;
use App\Models\Revisiones;
use App\Models\Ingresos;
use App\Models\Ciudades;
use App\Models\Departamentos;
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

        public function create()
        {
            // Recupera la lista de departamentos desde tu modelo Departamentos
            $departamentos = Departamentos::all();
        
            return view('vehiculos.create', compact('departamentos'));
        }
        public function buscar(Request $request)
        {
            $term = $request->input('search');

            $revisiones = Revision::join('vehiculos', 'revisiones.idvehiculo', '=', 'vehiculos.idvehiculo')
                ->join('marcas', 'vehiculos.idmarca', '=', 'marcas.idmarca')
                ->where('vehiculos.numeroplaca', 'LIKE', "%$term%")
                ->orWhere('vehiculos.modelo', 'LIKE', "%$term%")
                ->orWhere('marcas.nombre', 'LIKE', "%$term%")
                ->select('revisiones.*')
                ->get();

            return view('revisiones.index', compact('revisiones'));
        }

        
    
        public function store(Request $request)
        {
            // Valida y almacena la información en la base de datos
            $request->validate([
                'numeroplaca' => 'required|string',
                'modelo' => 'required|string',
                'nombre_marca' => 'required|string',
                'idciudad'=> $request['ciudad'],
                'iddepartamento'=> $request['depto']
               
            ]);
        
            // Primero, crea un nuevo registro en la tabla "vehiculos"
            $vehiculo = new Vehiculos();
            $vehiculo->numeroplaca = $request->input('numeroplaca');
            $vehiculo->modelo = $request->input('modelo');
            $vehiculo->save();
        
            // Luego, crea un nuevo registro en la tabla "marcas"
            $marca = new Marcas();
            $marca->nombre = $request->input('nombre_marca');
            $marca->save();
        
            // Finalmente, crea un nuevo registro en la tabla "vehiculos" y relaciona los IDs
           
        
            // Redirecciona a la página de listado de vehiculos u otra vista
            return redirect()->route('vehiculos.index');
        }
        public function consultarCiudades( $id)
        {
           
            $ciudades = Ciudades::where('iddepartamento', $id)->orderBy('nombre', 'ASC')->get();
            return ($ciudades);
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
            $vehiculos = Vehiculos::where('idvehiculo', '=', $id)->get();
            $departamentos = Departamentos::orderBy('nombre', 'ASC')->get(); // Obtén los departamentos
        
            return view('vehiculos/edit', compact('vehiculos', 'departamentos'));
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


        public function update(Request $request, $id)
        {
            // Valida y almacena la información actualizada en la base de datos
            $request->validate([
                'numeroplaca' => 'required|string',
                'modelo' => 'required|string',
                'nombre_marca' => 'required|string',
                'idciudad' => $request['ciudad'],
                'iddepartamento' => $request['depto']
            ]);

            // Busca el vehículo que se va a actualizar
            $vehiculo = Vehiculos::find($id);

            if (!$vehiculo) {
                // Puedes manejar la situación en la que el vehículo no se encuentre
                // Puedes redirigir, mostrar un mensaje de error, etc.
                return redirect()->route('vehiculos.index')->with('error', 'El vehículo no se encontró.');
            }

            // Actualiza los campos del vehículo
            $vehiculo->numeroplaca = $request->input('numeroplaca');
            $vehiculo->modelo = $request->input('modelo');
            $vehiculo->save();

            // También puedes actualizar la marca si fuera necesario
            $marca = Marcas::where('nombre', $request->input('nombre_marca'))->first();

            if (!$marca) {
                $marca = new Marcas();
                $marca->nombre = $request->input('nombre_marca');
                $marca->save();
            }

            // Relaciona los IDs y guarda las relaciones en las tablas de pivote si es necesario

            // Redirecciona a la página de listado de vehículos u otra vista
            return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente.');
        }



       
}
