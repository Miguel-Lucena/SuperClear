@extends('admin.layouts.dashboard')

@section('content')

<h1>Crear nuevo Rubro</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="/rubros" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre de Rubro</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>
   
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Crear">
    </div>
</form>
<script>
    CKEDITOR.replace('post_content');
</script>

@endsection
