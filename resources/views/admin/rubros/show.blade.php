@extends('admin.layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Nombre: {{$rubro->name}}</h3>
            </div>
            <div class="card-footer">
                <a href="{{url()->previous()}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
       
@endsection