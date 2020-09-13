<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Panel de Administración</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/admin/sb-admin.css" rel="stylesheet">

  <!--ckEditor 4-->
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  
  <!-- Para que funcione lo de provincia localidad-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">Super Clean</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> 
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </nav>
    <!-- lo de arroba esta bien -->
   <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/users">
            <i class="fas fa-fw fa-table"></i>
            <span>Usuarios</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/providers">
            <i class="fas fa-fw fa-table"></i>
            <span>Proveedores</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rubros">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Rubros</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Productos</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orders">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Factura de pago</span></a>
        </li>
      </ul>
  
    <div id="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Super Clean 2020</span>
                </div>
            </div>
         </footer>
    </div>
<!-- /.content-wrapper -->
   <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

          <!--Para poder deslogearse en el panel de administración-->
          <a  class="btn btn-primary" href="#"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ _('Cerrar Sesión') }}
          </a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
          @csrf
          </form>


         {{-- <a class="btn btn-primary" href="login.html">Logout</a>--}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript
  <script src="/vendor/chart.js/Chart.min.js"></script>-->
  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/admin/sb-admin.js"></script>


  <!-- Demo scripts for this page-->
  <script src="/js/admin/demo/datatables-demo.js"></script>
  <script src="/js/admin/demo/chart-area-demo.js"></script>



  @yield('js_user_page')
  @yield('js_role_page')
  @yield('js_product_page')
  @yield('js_province_page')
  
 
</body>

</html>
