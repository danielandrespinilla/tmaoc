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
        //
        $ingresos = Ingresos::orderBy('fechahoraingreso','ASC')->get();
        return view('ingresos/index',['ingresos'=>$ingresos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ingresos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       /*  dd($request); */
            Ingresos::create([
            'fechahoraingreso'=>$request['fechahoraingreso'] /*Nombre del name del input*/
            ]);
            return redirect()->back();
    }


    public function salida(Request $request)

    {
        dd("dd");
        Ingresos::create([
            'fechahorasalida'=>now()/*Nombre del name del input*/
            ]);
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
    public function edit(string $id)
    {
        //
        $ingresos = Ingresos::where('idingreso', '=', $id)->get();
        return view('ingresos/edit',['ingresos' =>$ingresos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ingresos = Ingresos::findOrFail($id);
        $ingresos->update([
            'fechahoraingreso'=>$request['fechahoraingreso']
        ]);
        return redirect()->route('ingresos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ingresos = Ingresos::findOrFail($id);
        $ingresos -> delete();
        return redirect()->route('ingresos.index');
    }
}

