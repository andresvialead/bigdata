<?php

require_once('../controladores/conexion/conexion.php');
require_once('../controladores/campanyas/ctrl_campanyas.php');
require_once('../controladores/registros/ctrl_registros.php');
require_once('../modelos/campanyas/mdl_campanyas.php');


/*if(isset($_POST['cantidad']))
        {   
            getRegistros($_POST['cantidad']);
        }*/

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
    <link href="../lib/SpinKit/spinkit.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="../css/shamcey.css">

    <script type="text/javascript">
      $(function() {
        $('#form-registros').submit(function(event) {
          console.log("Envío datos POST del formulario");

          $('#alert-success').css("display", "none");
          $('#alert-error').css("display", "none");

          var cantidad = $('#cantidad').val();
          var fecha_envio = $('#fecha_envio').val();
          var campanya = $('#campanya').val();
          var hora= $('#hora').val();
          var lista= $('#lista').val();


          $.ajax({                        
              type: "POST",                 
              url: '../funciones/registros-resp.php', 

              data: {cantidad: cantidad,fecha_envio: fecha_envio,campanya: campanya,hora: hora,lista: lista}, 
             
              beforeSend: function () {
                        console.log("Esperando respuesta...");
                        $('#campanyaButton').css("display", "none");
                        $('#campanyaGIF').css("display", "block");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        if(response == 'ERROR'){

                            console.log("¡Ha ocurrido un error!");
                            $('#alert-error').css("display", "block");

                        }else{
                          
                            console.log("Registros insertados!" + response);

                            $('#cantidad').val("");

                            $('#alert-success').css("display", "block");


                            $("#descarga").attr("href", response);

                            $('#descarga').css("display", "block");
                            $('#campanyaButton').css("display", "block");
                            $('#campanyaGIF').css("display", "none");




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
          <a href="index.php" class="nav-link">
            <i class="icon ion-ios-home-outline"></i>
            <span>Inicio</span>
          </a>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Afiliados</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="afiliados.php" class="nav-link">Crear afiliado</a></li>
            <li class="nav-item"><a href="afiliados.php" class="nav-link">Ver afiliados</a></li>
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
          <a href="" class="nav-link with-sub active">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Registros</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="registros.php" class="nav-link active">Descargar registros</a></li>
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
          <span class="breadcrumb-item active">Registros</span>
        </nav>
      </div><!-- sh-breadcrumb -->
      <div class="sh-pagetitle">
        <div class="input-group">

        </div><!-- input-group -->
        <div class="sh-pagetitle-left">
          <div class="sh-pagetitle-icon"><i class="icon ion-ios-home"></i></div>
          <div class="sh-pagetitle-title">
            <span>Panel de control</span>
            <h2>Registros</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Descarga los registros necesarios</div>
          <div class="card-body pd-sm-30">

            <form method="POST" id="form-registros" data-parsley-validate>
              <div class="wd-350">
                <p class="mg-b-20 mg-sm-b-30">Selecciona la campaña de envío</p>

                <div class="d-md-flex mg-b-30">


                   <?php 


                  $campanyas = ctrl_campanyas::getAll();

                  $listas = ctrl_registros::getListas();

                  ?>
                  <select class="form-control select2" name="campanya" id="campanya" data-placeholder="Selecciona la campaña" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                   <!-- <option label="Selecciona la campaña"></option>
                    <option value="Campaña 1">Campaña 1</option>
                    <option value="Campaña 2">Campaña 2</option>
                    <option value="Campaña 3">Campaña 3</option>
                    <option value="Campaña 4">Campaña 4</option>
                    <option value="Campaña 5">Campaña 5</option>-->


                    <?php

                      foreach ($campanyas as $result) {
                          echo '<option value="'.$result->getId().'">'.$result->getNombre_campanya().'</option>';
                      }
                  ?>


                  </select>
                </div><!-- d-flex -->

                <div class="d-md-flex mg-b-30">
                  <select class="form-control select2" name="lista" id="lista" data-placeholder="Actividad que quieres descargar" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                    <!--<option label="Actividad que quieres descargar"></option>
                    <option value="1">Muy activos</option>
                    <option value="2">Activos</option>
                    <option value="3">Activos fríos</option>
                    <option value="4">No activos</option>-->

                    <?php

                      foreach ($listas as $result2) {
                          echo '<option value="'.$result2.'">'.$result2.'</option>';
                      }
                  ?>


                  </select>
                </div><!-- d-flex -->

                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Fecha de envío: <span class="tx-danger">*</span></label>
                    <input type="date" name="fecha_envio" id="fecha_envio" class="form-control wd-200 wd-sm-250"  required>
                  </div><!-- form-group -->


                  <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                    <label>Hora: </label>
                      <select class="form-control select2" name="hora" id="hora" data-placeholder="Hora del envío" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                        <option value="08:00:00">08:00</option>
                        <option value="16:00:00">16:00</option>
                        <option value="20:00:00">20:00</option>
                      </select>
                  </div><!-- form-group -->
                </div><!-- d-flex -->


                <div class="d-md-flex mg-b-30">
                  <div class="form-group mg-b-0">
                    <label>Cantidad de registros a descargar: <span class="tx-danger">*</span></label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control wd-200 wd-sm-250" placeholder="25.000" required>
                  </div><!-- form-group -->
                </div><!-- d-flex -->                

                <button type="submit" name="campanya" style="display: block;" id="campanyaButton" class="btn btn-success">Calcular registros y descargar</button>
                <div class="col-md-6 col-xl-4 mg-t-30">

                <span style="display: none;" id="campanyaGIF">
                  <div class="d-flex bg-gray-50 ht-50 pos-relative align-items-center">
                      <div class="sk-chasing-dots">
                        <div class="sk-child sk-dot1"></div>
                        <div class="sk-child sk-dot2"></div>
                      </div>
                    </div><!-- d-flex -->
                  </div><!-- col-4 -->
                </span>

                <br>
                <a href="" id="descarga" style= "display:none">Descarga fichero</a>

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
