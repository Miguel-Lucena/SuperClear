@extends('layouts.app')

@section('content')
{{-- La ruta de register--}}
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <img width="385" src="/storage/images/vistas/register.jpg" alt="">
          </div>
            <div class="card-body">
                <h5 class="card-title text-center">Registrar</h5>
                <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-label-group">
                    <input type="text" id="inputUserame" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="name" autofocus>
                    <label for="inputUserame">Nombre de usuario</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" placeholder="Email address" required autocomplete="email">
                    <label for="inputEmail">Correo electronico</label> 
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <hr>

                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    <label for="inputPassword">Contraseña</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-label-group">
                    <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation" placeholder="Password" required>
                    <label for="inputConfirmPassword">Repetir contraseña</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registar</button>
                <a class="d-block text-center mt-2 small" href="#"></a>
                <hr class="my-4">
                
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
