@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('{{asset('/storage/images/products_images/' .$product->image_product_url)}}'">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>{{$product->name}}</h1>
                    <span class="subheading">Category {{$product->rubro->name}}</span>
                </div>
            </div>
        </div>
    </div>
    </header>

    <!--Contenido-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>{!!$product->description!!}</p>
            </div>
        </div>
        <p>
            <a href="/cart/store/{{$product->id}}" class="btn btn-warning btn-block">
                Comprar <i class="fa fa-cart-plus fa-2x"></i>
            </a>
        </p>
    </div>
    <hr>
    @endsection