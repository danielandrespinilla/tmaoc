@extends('../indexinicio')
@section('contenidobd')
    <div>
        <form action="{{route('ingresos.update',$ingresos->idingreso)}}" method="put">
            @csrf
            <div>
                <label for="">Fecha</label>
                <input type="date" name="fechahoraingreso" id="" value="{{$ingresos->fechahoraingreso}}">
            </div>
            <button>Actualizar</button>
        </form>
    </div>
@endsection