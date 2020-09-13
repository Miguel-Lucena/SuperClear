@extends('admin.layouts.dashboard')

@section('content')

<h1>Crear Nuevo  Proveedor</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/providers" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre de Proveedor</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="business_name">Razon Social</label>
        <input type="text" name="business_name" class="form-control" id="business_name" placeholder="Razon social..." value="{{ old('business_name') }}" required>
    </div>
    <div class="form-group">
        <label for="cuit">CUIT</label>
        <input type="text" name="cuit" class="form-control" id="cuit" placeholder="CUIT..." value="{{ old('cuit') }}" required>
    </div>
    <div class="form-group">
        <label for="phone_number">Numero de Telefono</label>
        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Numero de Telefono..." value="{{ old('phone_number') }}" required>
    </div>
    <div class="form-group">
        <label for="adress">Domicilio</label>
        <input type="text" name="adress" class="form-control" id="adress" placeholder="Direccion..." value="{{ old('adress') }}" required>
    </div>
    <div class="form-group">
        <label for="province">Provincia</label>
        <select class="province form-control" name="province" id="province">
            <option value="">Seleccione su provincia...</option>
            @foreach ($provinces as $province)
            <option data-province-id="{{$province->id}}" value="{{$province->id}}">{{$province->name}}</option>
            @endforeach
        </select>
    </div>

    <div  class="form-group">
        <select class="town form-control" name="twno" id="town"></select>
    </div>
      
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Crear">
    </div>
</form>    


@endsection

@section('js_province_page')

    <script>
        $(document).ready(function(){
            $('#province').on('change', function(event){
                var province_id =$('#province').val();
                console.log(province_id);
               if ($.trim(province_id) != ''){
               
                $.ajax({
                    url: "/providers/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        province_id: province_id,
                    }
                }).done(function(towns)
                    {  
                        $('#town').empty();
                        $('#town').append("<option value=''> Seleccione su localidad...</option>")
                        $.each(towns, function(index, value){
                        $('#town').append("<option value='"+value.id+"'>"+value.name+"</option>");
                        })

                    });
               }
            });
        });
    </script>

@endsection