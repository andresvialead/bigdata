<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/afiliados/ctrl_afiliados.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Shamcey">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/shamcey/img/shamcey-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/shamcey">
    <meta property="og:title" content="Shamcey">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/shamcey/img/shamcey-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/shamcey/img/shamcey-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>MailControl ViaLeadGeneration</title>

    <!-- Vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="../css/shamcey.css">
    <script type="text/javascript">
      $(function() {
        $('#form-afiliados').submit(function(event) {
          console.log("Envío datos POST del formulario");

          $('#alert-success').css("display", "none");
          $('#alert-error').css("display", "none");

          var nombre = $('#nombre').val();
          var apellidos = $('#apellidos').val();
          var telefono = $('#telefono').val();
          var email = $('#email').val();
          var nombre_afiliado = $('#nombre_afiliado').val();
          var cif_afiliado = $('#cif_afiliado').val();
          var direccion_afiliado = $('#direccion_afiliado').val();
          var cp_afiliado = $('#cp_afiliado').val();
          var poblacion_afiliado = $('#poblacion_afiliado').val();
          var provincia_afiliado = $('#provincia_afiliado').val();

          $.ajax({                        
              type: "POST",                 
              url: '../funciones/afiliados-resp.php',                     
              data: {nombre: nombre, apellidos: apellidos, telefono: telefono, email: email, nombre_afiliado: nombre_afiliado, cif_afiliado: cif_afiliado, direccion_afiliado: direccion_afiliado, cp_afiliado: cp_afiliado, poblacion_afiliado: poblacion_afiliado, provincia_afiliado: provincia_afiliado}, 
              beforeSend: function () {
                        console.log("Esperando respuesta...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        if(response == 'ERROR'){
                            console.log("¡Ha ocurrido un error!");
                            $('#alert-error').css("display", "block");

                        }else{
                            console.log("¡Afiliado insertado!" + response);
                            $('#nombre').val("");
                            $('#apellidos').val("");
                            $('#telefono').val("");
                            $('#email').val("");
                            $('#nombre_afiliado').val("");
                            $('#cif_afiliado').val("");
                            $('#direccion_afiliado').val("");
                            $('#cp_afiliado').val("");
                            $('#poblacion_afiliado').val("");
                            $('#provincia_afiliado').val("");

                            $('#alert-success').css("display", "block");

                        }
              },
              error:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        console.log("ERROR");
              }
          });
          return false;
        });
      });
    </script>
  </head>

  <body>

    <div class="sh-logopanel">
      <a href="" class="sh-logo-text">VLG</a>
      <a id="navicon" href="" class="sh-navicon d-none d-xl-block"><i class="icon ion-navicon"></i></a>
      <a id="naviconMobile" href="" class="sh-navicon d-xl-none"><i class="icon ion-navicon"></i></a>
    </div><!-- sh-logopanel -->

    <div class="sh-sideleft-menu">
      <label class="sh-sidebar-label">Panel de control</label>
      <ul class="nav">
        <li class="nav-item">
          <a href="inicio.php" class="nav-link">
            <i class="icon ion-ios-home-outline"></i>
            <span>Inicio</span>
          </a>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub active">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Afiliados</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="afiliados.php" class="nav-link active">Crear afiliado</a></li>
            <li class="nav-item"><a href="afiliados-view.php" class="nav-link">Ver afiliados</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Campañas</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="campanyas.php" class="nav-link">Crear nueva campaña</a></li>
            <li class="nav-item"><a href="campanyas-view.php" class="nav-link">Ver campañas</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Registros</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="registros.php" class="nav-link">Descargar registros</a></li>
            <li class="nav-item"><a href="datos-campanyas.php" class="nav-link">Datos por campaña</a></li>
          </ul>
        </li><!-- nav-item -->
        <!--<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Forms</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
          </ul>
        </li><!-- nav-item -->
        <!--<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>UI Elements</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
            <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
            <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
            <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
            <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
            <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
            <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
            <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
            <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
            <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
            <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
            <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
          </ul>
        </li><!-- nav-item -->
        <!--<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-analytics-outline"></i>
            <span>Charts</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
            <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
            <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
            <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
            <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
          </ul>
        </li><!-- nav-item -->
        <!--<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-navigate-outline"></i>
            <span>Maps</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
            <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
          </ul>
        </li><!-- nav-item -->
        <!--<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-list-outline"></i>
            <span>Tables</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
            <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
          </ul>
        </li><!-- nav-item -->
      </ul>
    </div><!-- sh-sideleft-menu -->

    <div class="sh-headpanel">
      <div class="sh-headpanel-left">

        <!-- START: HIDDEN IN MOBILE -->
        <!--<a href="" class="sh-icon-link">
          <div>
            <i class="icon ion-ios-folder-outline"></i>
            <span>Directory</span>
          </div>
        </a>
        <a href="" class="sh-icon-link">
          <div>
            <i class="icon ion-ios-calendar-outline"></i>
            <span>Events</span>
          </div>
        </a>
        <a href="" class="sh-icon-link">
          <div>
            <i class="icon ion-ios-gear-outline"></i>
            <span>Settings</span>
          </div>
        </a>
        <!-- END: HIDDEN IN MOBILE -->

        <!-- START: DISPLAYED IN MOBILE ONLY -->
        <div class="dropdown dropdown-app-list">
          <a href="" data-toggle="dropdown" class="dropdown-link">
            <i class="icon ion-ios-keypad tx-18"></i>
          </a>
          <div class="dropdown-menu">
            <div class="row no-gutters">
              <div class="col-4">
                <a href="" class="dropdown-menu-link">
                  <div>
                    <i class="icon ion-ios-folder-outline"></i>
                    <span>Directory</span>
                  </div>
                </a>
              </div><!-- col-4 -->
              <div class="col-4">
                <a href="" class="dropdown-menu-link">
                  <div>
                    <i class="icon ion-ios-calendar-outline"></i>
                    <span>Events</span>
                  </div>
                </a>
              </div><!-- col-4 -->
              <div class="col-4">
                <a href="" class="dropdown-menu-link">
                  <div>
                    <i class="icon ion-ios-gear-outline"></i>
                    <span>Settings</span>
                  </div>
                </a>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <!-- END: DISPLAYED IN MOBILE ONLY -->

      </div><!-- sh-headpanel-left -->

      <div class="sh-headpanel-right">
        
        <div class="dropdown dropdown-profile">
          <a href="" data-toggle="dropdown" class="dropdown-link">
            <img src="../img/img1.jpg" class="wd-60 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="media align-items-center">
              <img src="../img/img1.jpg" class="wd-60 ht-60 rounded-circle bd pd-5" alt="">
              <div class="media-body">
                <h6 class="tx-inverse tx-15 mg-b-5">Kevin Douglas</h6>
                <p class="mg-b-0 tx-12">kdouglas@domain.com</p>
              </div><!-- media-body -->
            </div><!-- media -->
            <hr>
            <ul class="dropdown-profile-nav">
              <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- sh-headpanel-right -->
    </div><!-- sh-headpanel -->

    <div class="sh-mainpanel">
      <div class="sh-breadcrumb">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="index2.html">Inicio</a>
          <span class="breadcrumb-item active">Afiliados</span>
        </nav>
      </div><!-- sh-breadcrumb -->
      <div class="sh-pagetitle">
        <div class="input-group">

        </div><!-- input-group -->
        <div class="sh-pagetitle-left">
          <div class="sh-pagetitle-icon"><i class="icon ion-ios-home"></i></div>
          <div class="sh-pagetitle-title">
            <span>Panel de control</span>
            <h2>Afiliados</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        <div class="alert alert-success pd-y-20" style="display: none" id="alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="d-sm-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
            <div class="mg-t-20 mg-sm-t-0">
              <h5 class="mg-b-2 tx-success">Los datos del afiliado se han insertado correctamente.</h5>
            </div>
          </div><!-- d-flex -->
        </div><!-- alert -->

        <div class="alert alert-danger pd-y-20 mg-b-0" style="display: none" id="alert-error" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="d-sm-flex align-items-center justify-content-start">
            <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
            <div class="mg-t-20 mg-sm-t-0">
              <h5 class="mg-b-2 tx-danger">¡Ha ocurrido un error! No se ha insertado el afiliado.</h5>
            </div>
          </div><!-- d-flex -->
        </div><!-- alert -->


        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Añadir un nuevo afiliado</div>
          <div class="card-body pd-sm-30">
            <p class="mg-b-20 mg-sm-b-30">Datos del contacto</p>

            <form method="POST" id="form-afiliados" data-parsley-validate>
              <div class="wd-300">
                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Nombre: <span class="tx-danger">*</span></label>
                    <input type="text" name="nombre" id="nombre" class="form-control wd-200 wd-sm-250" placeholder="Introduce el nombre" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Apellidos: <span class="tx-danger">*</span></label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control wd-200 wd-sm-250" placeholder="Introduce los apellidos" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Telefono: <span class="tx-danger">*</span></label>
                    <input type="phone" name="telefono" id="telefono" class="form-control wd-200 wd-sm-250" placeholder="Introduce el teléfono" required>
                  </div><!-- form-group -->
                </div><!-- d-flex -->
                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Email: <span class="tx-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control wd-200 wd-sm-250" placeholder="Introduce el email" required>
                  </div><!-- form-group -->
                </div>


                <p class="mg-b-20 mg-sm-b-30">Datos de la empresa</p>

                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Nombre de afiliado: <span class="tx-danger">*</span></label>
                    <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce el nombre de afiliado" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>CIF: <span class="tx-danger">*</span></label>
                    <input type="text" name="cif_afiliado" id="cif_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce el CIF" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Dirección: <span class="tx-danger">*</span></label>
                    <input type="text" name="direccion_afiliado" id="direccion_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce la dirección" required>
                  </div><!-- form-group -->
                </div><!-- d-flex -->
                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Código postal: <span class="tx-danger">*</span></label>
                    <input type="text" name="cp_afiliado" id="cp_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce el código postal" maxlength="5" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Población: <span class="tx-danger">*</span></label>
                    <input type="text" name="poblacion_afiliado" id="poblacion_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce la población" required>
                  </div><!-- form-group -->
                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Provincia: <span class="tx-danger">*</span></label>
                    <input type="text" name="provincia_afiliado" id="provincia_afiliado" class="form-control wd-200 wd-sm-250" placeholder="Introduce la provincia" required>
                  </div><!-- form-group -->
                </div><!-- d-flex -->
                <button type="submit" class="btn btn-success">Guardar afiliado</button>
              </div>
            </form>
          </div><!-- card-body -->
        </div><!-- card -->

      </div><!-- sh-pagebody -->
      <div class="sh-footer">
        <div>Copyright &copy; 2018. Todos los derechos reservados.</div>
        
      </div><!-- sh-footer -->
    </div><!-- sh-mainpanel -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/moment/moment.js"></script>
    <script src="../lib/Flot/jquery.flot.js"></script>
    <script src="../lib/Flot/jquery.flot.resize.js"></script>
    <script src="../lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="../js/shamcey.js"></script>
    <script src="../js/dashboard.js"></script>
  </body>
</html>
