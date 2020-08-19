@extends('admin.layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Nombre: {{$user->name}}</h3>
                <h3>Email: {{$user->email}}</h3>
                <h3>Perfil: {{$user->view == 1  ? "Administrador" : "Usuario" }}</h3>
              {{--  <h3>Numero de Post: ......</h3>--}}
            </div>
            <div class="card-footer">
                <a href="{{url()->previous()}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
       
@endsection