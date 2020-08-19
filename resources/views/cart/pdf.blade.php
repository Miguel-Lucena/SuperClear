<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Document</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even){background-color: #f2f2f2}
      
      th {
        background-color: #4CAF50;
        color: white;
      }
      h1 {
  text-align: center;
      }
      h2 {
        text-align: center;
      }

      h3 {
  text-align: right;
      }
      </style>
</head>
<body>

<h1 class="text-center"><b>Tienda MIGUEL SRL</b></h1>
<h2 class="text-center" >Monteagudo 435 - San Miguel de Tucumán</h2>
<h2>Factura N°{{$factura->id}} -  Emitido: {{$factura->created_at}}</h2>
 <div class="card mb-3">
        <div class="container text-center card-body">
            <div class="table-reponsive">
                <h2>Datos del Cliente</h2>
                <h4>Nombre: {{Auth::user()->name}}</h4>
                <h4>Correo: {{Auth::user()->email}}</h4>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div>
            <h2 class="text-center">Detalle del Pedido</h2>
        </div>
              <div>
                <div>
                  <table width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>SUBTOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cart as $item)
                      <tr>
                          <td>{{$item->name}}</td>
                          <td>{{number_format($item->price,2)}}</td>
                          <td>{{$item->quantity}}</td>
                          <td>{{number_format($item->price * $item->quantity,2)}}</td>  
                      </tr> 
                @endforeach
                    </tbody> 
                  </table>
                  <div>
                      <hr>
                          <h3>
                              <span>
                                  SubTotal: ${{number_format($total, 2)}}
                              </span>
                          </h3>
                          <h3>
                            <span>
                                Costo del envio $100
                            </span>
                          </h3>
                          <hr>
                          <h3>
                            <span>
                               <label for=""> Total: ${{number_format($total, 2)+100}}</label>
                            </span>
                          </h3>
                  </div>
                </div>
              </div>
      </div>
</body>
</html>