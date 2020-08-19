@extends('layouts.app')


@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/storage/images/vistas/welcome.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Super Clean</h1>
            <span class="subheading">Empresa de venta de insumos de limpieza</span>
          </div>
        </div>
      </div>
    </div>
  </header>


   <!-- Main Content -->
   <div class="container">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="row">

          @foreach ($products as $product)
          @if ($product->view == 1)
            <div class="col-md-4">
              <img class="img-thubnail mt-4" src="{{asset('/storage/images/products_images/' .$product->image_product_url)}}" width="100%" alt="alt_post">
            </div>
            <div class="col-lg-8">
              <div class="post-preview">
                <a href="/home/product/{{$product->id}}">
                  <h2 class="post-title">
                    {{$product->name}}
                  </h2>
                  <h3 class="post-subtitle">
                    {!!$product->description!!}
                  </h3>
                  <h3 class="post-subtitle">
                   ${{number_format($product->price,2)}}
                  </h3>
                </a>
                <p>
                  <a href="/cart/store/{{$product->id}}" class="btn btn-warning">
                      <i class="fa fa-cart-plus"></i>Comprar
                  </a>
                </p>
              </div>
            </div>
            @endif
            <hr>
          @endforeach
      </div>
       <!-- Pager-->
       {{$products->links()}}
    </div>
  </div>


@endsection

