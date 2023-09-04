@extends('layouts.administradores')
@section('content')
<div>
    <form action="{{route('administradores.update',Auth::user()->id)}}" method="put">
        @csrf <!-- Agregar el método PUT -->

        @if($emp > 0)
            @forelse ($administradores as $emp)
                <div>
                    <label for="codigo">Codigo usuario</label>
                    <input type="text" name="codigo" id="codigo" value="{{ $emp->user_id }}">
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $emp->nombre }}">
                </div>
                <div>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" value="{{ $emp->apellido }}">
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="{{ $emp->telefono }}">
                </div>
                <div>
                    <label for="numerodocumento">Documento</label>
                    <input type="text" name="numerodocumento" id="numerodocumento" value="{{ $emp->numerodocumento }}">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ $emp->email }}">
                </div>
                <div>
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo">
                        <option value="vigilante" @if($emp->tipo === 'vigilante') selected @endif>Vigilante</option>
                        <option value="mecanico" @if($emp->tipo === 'mecanico') selected @endif>Mecánico</option>
                        <option value="otro" @if($emp->tipo === 'otro') selected @endif>Otro</option>
                    </select>
                </div>
            @empty
            @endforelse
        @else
            <div>
                <label for="codigo">Codigo usuario</label>
                <input type="text" name="codigo" id="codigo" value="{{ Auth::user()->id }}">
            </div>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ Auth::user()->name }}">
            </div>
            <div>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="{{ Auth::user()->name }}">
            </div>
            <div>
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="">
            </div>
            <div>
                <label for="numerodocumento">Documento</label>
                <input type="text" name="numerodocumento" id="numerodocumento" value="">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            </div>
            <div>
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="vigilante">Vigilante</option>
                    <option value="mecanico">Mecánico</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        @endif

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
