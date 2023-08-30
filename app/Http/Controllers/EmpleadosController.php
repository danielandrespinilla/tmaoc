<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleados;

class EmpleadosController extends Controller
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
        //
        $cantidadempleados = Empleados::where('iduser','=',$id )->count();
        if($cantidadempleados>0){
            $empleados=Empleados::where('iduser','=',$id)->get();
            return view('empleado/actualizar',['empleados'=>$empleados])->with('emp',$cantidadempleados);
        }
        else {
            return view('empleado/actualizar')->with('emp',$cantidadempleados);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cantidadempleados=Empleados::where('iduser','=',$id)->count();
        if($cantidadempleados>0){
            $empleados=Empleados::where('iduser','=',$id);
            $empleados->update([
                'iduser'=>request('codigo'),
                'documento'=>request('documento'),
                'nombre'=>request('nombre'),
                'apellido'=>request('apellido'),
                'email'=>request('email')

            ]);
        }
        else{
            Empleados::create([
                'iduser'=>request('codigo'),
                'documento'=>request('documento'),
                'nombre'=>request('nombre'),
                'apellido'=>request('apellido'),
                'email'=>request('email')
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
