@extends('admin.layouts.dashboard')

@section('content')

    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Lista de Proveedores</h2>
      </div>
      <div class="col-md-6">
          <a href="/providers/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear nuevo Proveedor</a>
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
                  <th>Nombre</th>
                  <th>Razon Social</th>
                  <th>CUIT</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Localidad</th>
                  <th>Herramientas</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Razon Social</th>
                  <th>CUIT</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Localidad</th>
                  <th>Herramientas</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($providers as $provider)
                <tr>
                    <td>{{$provider->id}}</td>
                    <td>{{$provider->name}}</td>
                    <td>{{$provider->business_name}}</td>
                    <td>{{$provider->cuit}}</td>
                    <td>{{$provider->phone_number}}</td>
                    <td>{{$provider->adress}}</td>
                    <td>{{$provider->town->name}}</td>
                    <td>
                   {{-- <a href="/products/{{$product->id}}"><i class="fa fa-eye"></i></a> --}}
                    <a href="/providers/{{$provider->id}}/edit"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-providerid="{{$provider->id}}"><i class="fas fa-trash-alt"></i></a>
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
            <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este proveedor</div>
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
          var provider_id = button.data('providerid') 
          var modal = $(this)
          //modal.find('.modal-title').text('New message to ' + recipient)
          //modal.find('.modal-footer #user_id').val(user_id)
          modal.find('form').attr('action', '/providers/' + provider_id)
        })      
    </script>
@endsection