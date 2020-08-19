@extends('admin.layouts.dashboard')

@section('content')
<h1>Editar Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif




<form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
    @method('PATCH')
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre de usuario</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
    </div>
    <div class="dorm-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Pasword..." minlength="8">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="dorm-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Pasword..." id="password_confirmation">
    </div>
    <div class="form-group">
        <label for="view">Perfil</label>
            <select class="view form-control" name="view" id="view">
                <option value="1"  {{$user->view == 0  ? "" : "selected" }} >Administrador</option>
                <option value="0" {{$user->view == 1  ? "" : "selected" }} >Usuario</option>
            </select>
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Actualizar">
    </div>
</form>
     
@endsection