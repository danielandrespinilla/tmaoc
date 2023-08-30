@extends('layouts.consulta')
@section('content')
<div>
    <form action="{{route('empleados.update',Auth::user()->id)}}" method="put">
        @csrf
        @if($emp>0)
            @forelse ($empleados as $emp)
                <div>
                    <label for="">Codigo usuario</label>
                    <input type="text" name="codigo" id="" value="{{ $emp->iduser}}">
                </div>
                <div>
                    <label for="">Documento</label>
                    <input type="text" name="documento" id="" value="{{ $emp->documento}}">
                </div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="" value="{{ $emp->nombre}}">
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" id="" value="{{ $emp->apellido}}">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" id="" value="{{ $emp->email}}">
                </div>   
            @empty
            @endforelse
        @else
                <div>
                    <label for="">Codigo usuario</label>
                    <input type="text" name="codigo" id="" value="{{Auth::user()->id}}">
                </div>
                <div>
                    <label for="">Documento</label>
                    <input type="text" name="documento" id="" value="">
                </div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="" value="{{Auth::user()->name}}">
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" id="" value="{{Auth::user()->name}}">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" id="" value="{{Auth::user()->email}}">
                </div>
        @endif
        <button>Actualizar</button>        
    </form>
</div>
@endsection