@extends('admin.layouts.dashboard')

@section('content')
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Lista de Facturas</h2>
        </div>
    </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" ID="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Subtotal</th>
                      <th>Envio</th>
                      <th>TOTAL</th>
                      <th>Ver detalle</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Subtotal</th>
                      <th>Envio</th>
                      <th>TOTAL</th>
                      <th>Ver detalle</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>${{number_format($order->subtotal, 2)}}</td>
                        <td>${{number_format($order->shipping, 2)}}</td>
                        <td>${{number_format($order->subtotal+$order->shipping, 2)}}</td>
                        <td>
                        <a href="/orderitems/{{$order->id}}"><i class="fa fa-eye"></i></a>
                        </td>

                    </tr>
              @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection
