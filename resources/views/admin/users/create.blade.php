@extends('admin.layouts.dashboard')

@section('content')

<h1>Crear nuevo usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="/users" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre de usuario</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password...">
    </div>
    <div class="form-group">
        <label for="view">Perfil</label>
            <select class="view form-control" name="view" id="view">
                <option value="1" >Administrador</option>
                <option value="0" >Usuario</option>
            </select>
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Crear">
    </div>
</form>


@endsection
