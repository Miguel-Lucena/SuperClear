@extends('admin.layouts.dashboard')

@section('content')
<h1>Editar Product</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif




<form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
    @method('PATCH')
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre del Producto</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $product->name }}" required>
    </div>
    <label for="image">Select Image</label>
    <input type="file" name="image" class="form-control-file" id="image" value="{{ $product->image}}">
    <div class="row">
        <img src="{{asset('/storage/images/products_images/'.$product->image_product_url)}}" class="img-thumbnail mx-auto" width="250" alt="">
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        {{--<input type="text" name="description" class="form-control" id="description" placeholder="Description..." value="{{ $product->description }}" required>--}}
        <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
    </div>
     <div class="form-group">
        <label for="price">Precio</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Price..." value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="foreign">Rubro</label>
            <select class="rubro form-control" name="rubro" id="rubro">
                <option value="">Selecciones el rubro...</option>
                @foreach($rubros as $rubro)
                    <option value="{{$rubro->id}}" {{$product->rubro == null || $rubro->name != $product_rubro->name ? "" : "selected" }}>{{$rubro->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <label for="quantity">Stock</label>
        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Stock..." value="{{ $product->quantity }}" required>
    </div>
    <div class="form-group">
        <label for="foreign">Visibilidad</label>
            <select class="view form-control" name="view" id="view">
                <option value="1"  {{$product->view == 0  ? "" : "selected" }} >Si</option>
                <option value="0" {{$product->view == 1  ? "" : "selected" }} >No</option>
            </select>
    </div>
  
  


    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Actualizar">
    </div>
</form>

<script>
    CKEDITOR.replace('description');
</script>
     
@endsection