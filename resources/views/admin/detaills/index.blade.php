@extends('admin.layouts.dashboard')

@section('content')
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Detalle de la Factura N° {{$order_id}} </h2>
        </div>
    </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" ID="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Producto</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Producto</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($detaills as $orderIte)
                    @if ($orderIte->order_id == $order_id)
                    <tr>
                        <td>{{$orderIte->id}}</td>
                        <td>${{number_format($orderIte->price, 2)}}</td>
                        <td>{{$orderIte->quantity}}</td>
                        <td>{{$orderIte->product->name}}</td>
                    </tr>
                    @endif
              @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection
