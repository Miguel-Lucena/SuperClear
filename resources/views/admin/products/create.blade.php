@extends('admin.layouts.dashboard')

@section('content')

<h1>Crear nuevo Producto</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="/products" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre de Producto</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="image">Select image</label>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        {{--<input type="text" name="description" class="form-control" id="description" placeholder="Descripcion..." value="{{ old('description') }}" required>--}}
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Precio</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Precio..." value="{{ old('price') }}" required>
    </div>
    <div class="form-group">
        <label for="foreign">Rubro</label>
            <select class="rubro form-control" name="rubro" id="rubro">
                <option value="">Selecciones el rubro...</option>
                @foreach($rubros as $rubro)
                    <option value="{{$rubro->id}}">{{$rubro->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <label for="quantity">Stock</label>
        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Stock..." value="{{ old('quantity') }}" required>
    </div>
    <div class="form-group">
        <label for="foreign">Visible</label>
            <select class="view form-control" name="view" id="view">
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
    </div>
    <div class="form-group">
        <label for="foreign-provider">Proveedor</label>
            <select class="provider form-control" name="provider" id="provider">
                <option value="">Selecciones el Proveedor...</option>
                @foreach($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Crear">
    </div>
</form>

{{--Para el textare y mostrar el editor de texto en la descripcion
    textarea name=product_content--}}
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
