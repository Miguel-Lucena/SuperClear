@extends('layouts.app')


@section('content')
      <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
            <div class="container text-center">
                <div class="container text-center">
                    <h1><i class="fa fa-shopping-cart"></i></h1>
                </div>
            </div>
          
        </div>
      </div>
    </div>
  </header>
       <!-- DataTables Example -->
       <div class="card mb-3">
        <div class="container text-center">
            <h1>Carrito de compra</h1>
        </div>
        @if(count($cart))

              <div class="container text-center">
                  <p>
                      <a href="/cart/trash" class="btn btn-danger">
                          vaciar carrito <i class="fa fa-trash"></i>
                      </a>
                  </p>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" ID="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cart as $item)
                      <tr>
                          <td><img src="{{asset('/storage/images/products_images/' . $item->image_product_url)}}" alt="{{$item->image_product_url}}" width="50"></td>
                          <td>{{$item->name}}</td>
                          <td>{{number_format($item->price,2)}}</td>
                          {{--<td>{{$item->quantity}}</td>--}}
                      <td><input type="number" min="1" max="100" value="{{$item->quantity}}" id="product_{{$item->id}}">
                          <a class="btn btn-warning btn-update-item" href="#" data-href="update/{{$item->id}}" data-id="{{$item->id}}">
                              <i class="fa fa-refresh">Update</i>
                          </a>
                      </td>
                          
                      <td>{{number_format($item->price * $item->quantity,2)}}</td>
                          <td>
                              <a class="btn btn-danger" href="/cart/destroy/{{$item->id}}">
                                  <i class="fa fa-remove">x</i>
                              </a>
                          </td>
                      </tr>
                    
                @endforeach
               
               
                    </tbody>
                  
                  </table>

                  <div class="container text-center">
                      <hr>
                          <h3>
                              <span class="label label-success">
                                  Total: ${{number_format($total, 2)}}
                              </span>
                          </h3>
                      <hr>
                      <p>
                          <a class="btn btn-primary" href="/">
                            <i class="fa fa-chevron-circle-left"></i> Seguir comprando
                          </a>
                          <a class="btn btn-primary" href="/cart/detail_orders">
                            Continuar <i class="fa fa-chevron-circle-right"></i>
                          </a>
                      </p>
                  </div>
                </div>
              </div>
        @else
            <div class="container text-center">
                <h3><span class="label label-warning text-center">No hay productos en el carrito</span></h3>
            </div>
          @endif    
      </div>
      <hr>

@endsection

@section('js_update_quantity')
    <script>
        $(".btn-update-item").on('click', function (e) {
          e.preventDefault();
          var id = $(this).data('id')
          var href = $(this).data('href')
          var quantity = $("#product_"+id).val()
          window.location.href = href + "/" +quantity
        })      
    </script>
    
@endsection
