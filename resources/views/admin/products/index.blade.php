@extends('admin.layouts.dashboard')

@section('content')

    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Lista de Productos</h2>
      </div>
      <div class="col-md-6">
          <a href="/products/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear nuevo producto</a>
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
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Rubro</th>
                  <th>Stock</th>
                  <th>Visible</th>
                  <th>Proveedor</th>
                  <th>Herramientas</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Rubro</th>
                    <th>Stock</th>
                    <th>Visible</th>
                    <th>Proveedor</th>
                    <th>Herramientas</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{asset('/storage/images/products_images/' . $product->image_product_url)}}" alt="{{$product->image_product_url}}" width="100" height="100"></td>
                    <td>{{$product->name}}</td>
                    <td>{!!$product->description!!}</td>
                    <td>${{number_format($product->price,2)}}</td>
              {{--    <td>{{$product->rubro_id}}</td> --}}
                    <td>{{$product->rubro->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->view == 1  ? "Si" : "No" }}</td>
                    <td>{{$product->provider->name}}</td>
                    <td>
                   {{-- <a href="/products/{{$product->id}}"><i class="fa fa-eye"></i></a> --}}
                    <a href="/products/{{$product->id}}/edit"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-productid="{{$product->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
          @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>



            <!-- delete Modal-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Preparado para eliminar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este producto.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                  <form method="POST" action="">
                      @method('DELETE')
                      @csrf()
                    <!--  <input type="hidden" id="user_id" name="user_id" value="">-->
                      <a class="btn btn-primary"  onclick="$(this).closest('form').submit();">Eliminar</a>
                  </form>
                   
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('js_product_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var product_id = button.data('productid') 
          var modal = $(this)
          //modal.find('.modal-title').text('New message to ' + recipient)
          //modal.find('.modal-footer #user_id').val(user_id)
          modal.find('form').attr('action', '/products/' + product_id)
        })      
    </script>
    
@endsection