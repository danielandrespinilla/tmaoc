@extends('../indexinicio')
@section('contenidobd')
    <div>
        <form action="{{route('ingresos.store')}}" method="POST">
            @csrf
            <div>
                <label for=""> Fecha </label>
                <input type="date" name="fechahoraingreso" id="">
            </div>
            <button>Enviar</button>
        </form>
    </div>
@endsection