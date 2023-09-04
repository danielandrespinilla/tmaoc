@extends('../indexinicio')
@section('contenidobd')
    <div>
        <form action="{{route('admifunciones.store')}}" method="POST">
            @csrf
            <div>
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="">
                <label for="">Apellido</label>
                <input type="text" name="apellido" id="">
                <label for="">Numero documento</label>
                <input type="text" name="numerodocumento" id="">
            </div>
            <button>Enviar</button>
        </form>
    </div>
@endsection