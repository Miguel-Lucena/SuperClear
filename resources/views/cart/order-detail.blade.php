@extends('.layouts.app')


@section('content')
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            
                <div class="container text-center">
                    <div class="container text-center">
                        <h1><i class="fa fa-shopping-cart fa*2"></i></h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="card mb-3">
        <div class="container text-center card-body">
            <div class="table-reponsive">
                <h3>Datos del Usuario</h3>
                <table class="table table-bordered">
                <tr><td>Nombre</td><td>{{Auth::user()->name}}</td></tr>
                <tr><td>Correo</td><td>{{Auth::user()->email}}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="container text-center">
            <h3>Detalle del Pedido</h3>
        </div>

              <div class="container text-center card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" ID="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cart as $item)
                      <tr>
                          
                          <td>{{$item->name}}</td>
                          <td>{{number_format($item->price,2)}}</td>
                          <td>{{number_format($item->price * $item->quantity,2)}}</td>
                         
                      </tr>
                    
                @endforeach
               
               
                    </tbody>
                  
                  </table>

                  <div class="container text-center">
                      <hr>
                          <h3>
                              <span class="label label-success">
                                  SubTotal: ${{number_format($total, 2)}}
                              </span>
                          </h3>
                          <h3>
                            <span class="label label-success">
                                Costo del envio $100
                            </span>
                          </h3>
                          <hr>
                          <h3>
                            <span class="label label-success">
                               <label for=""> Total: ${{number_format($total, 2)+100}}</label>
                            </span>
                          </h3>
                      <hr>
                      <p>
                          <a class="btn btn-primary" href="/">
                            <i class="fa fa-chevron-circle-left"></i> Seguir comprando
                          </a>
                          <a class="btn btn-warning" href="/cart/detail_orders/pago">Pagar</a>
                      </p>
                  </div>
                </div>
              </div>
       
      </div>
      <hr>
@endsection