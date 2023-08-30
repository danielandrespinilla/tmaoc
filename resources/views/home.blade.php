@if(Auth::user()->rol == "Consulta")
    @php($vista='consulta')
@elseif(Auth::user()->rol=="Administrador")
    @php($vista='app')
@elseif(Auth::user()->rol=="Auxiliar administrativo")
    @php($vista='auxiliar')
@endif


@extends('layouts.' . $vista)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
