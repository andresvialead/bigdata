<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/campanyas/ctrl_campanyas.php');
require_once('../modelos/campanyas/mdl_campanyas.php');
require_once('../funciones/campanyas-resp.php');
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

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="../css/shamcey.css">
    <script type="text/javascript">
      
    function openModal(idCampanya){

      //console.log(idCampanya);
      $('#modaldemo1').modal('show');
      //&lt;img src='http://192.168.1.38:12570/BigData/funciones/pixel.php?id_campanya=12&id_registro=$$id$$&accion=apertura&'&gt;
      $('#pixelImpresion').text('<img src="https://www.vialeadgeneration.com/bigdata/funciones/pixel.php?id_campanya='+idCampanya+'&id_registro=$$id$$&accion=Apertura" height="1" width="1" />');    

      $('#pixelClick').text('<a href="https://www.vialeadgeneration.com/bigdata/funciones/pixel.php?id_campanya='+idCampanya+'&id_registro=$$id$$&accion=Click&url_click=[URL_CREATIVIDAD]">[IMG_CREATIVIDAD]</a>');                             

      $('#pixelConversion').text('<img src="https://www.vialeadgeneration.com/bigdata/funciones/pixel.php?id_campanya='+idCampanya+'&id_registro=1&accion=Conversion">');  


    }

    function openModal1(id){

       var idCampanya=id;

      
       $.ajax({                        
              type: "POST",                 
              url: '../funciones/campanyas-resp.php',                     
              data: {idCampanya:idCampanya}, 
              beforeSend: function () {
                        console.log("Esperando respuesta...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $('#modaldemo2').modal('show');
                      	document.getElementById('creativity').innerHTML = response;

                      	

                        
              },
              error:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        console.log("ERROR sda");
              }
          });


      }


          
        
      


    
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
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Afiliados</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="afiliados.php" class="nav-link">Crear afiliado</a></li>
            <li class="nav-item"><a href="afiliados-view.php" class="nav-link">Ver afiliados</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub active">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Campañas</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="campanyas.php" class="nav-link">Crear nueva campaña</a></li>
            <li class="nav-item"><a href="campanyas-view.php" class="nav-link active">Ver campañas</a></li>
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
        <!-- BASIC MODAL -->

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
          <span class="breadcrumb-item active">Campañas</span>
        </nav>
      </div><!-- sh-breadcrumb -->
      <div class="sh-pagetitle">
        <div class="input-group">
          
        </div><!-- input-group -->
        <div class="sh-pagetitle-left">
          <div class="sh-pagetitle-icon"><i class="icon ion-ios-list"></i></div>
          <div class="sh-pagetitle-title">
            <span>Panel de control</span>
            <h2>Campañas</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">

        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Todas las campañas</div>
          <div class="card-body pd-sm-30">

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-20p">Tipo de coste</th>
                    <th class="wd-15p">Coste</th>
                    <th class="wd-25p">Coste envío</th>
                    <th class="wd-25p">Creatividad</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $campanyas = ctrl_campanyas::getAll();

                      foreach ($campanyas as $result) {
                          echo '<tr>
                                  <td>
                                  <a href="#" onclick="openModal1('.$result->getId().')">'.$result->getNombre_campanya().' ('.$result->getId_afiliado().')
                                 </td>
                                  <td>'.$result->getTipo_coste().'</td>
                                  <td>'.number_format($result->getCoste(),2).'</td>
                                  <td>'.$result->getCoste_envio().'</td>
                                  <td><a href="#" class="btn btn-primary btn-icon rounded-circle mg-r-5 mg-b-10" onclick="openModal('.$result->getId().')"><div><i class="fa fa-eye"></i>
                                  </div>
                                  </a>
                                  <a href="../funciones/descarga.php?id_campanya='.$result->getId().'&nomb_creaty='.$result->getNombre_campanya().'" target="_blank" class="btn btn-primary btn-icon rounded-circle mg-r-5 mg-b-10"><div><i class="fa fa-download"></i> 
                                  </div>
                                  </a></td>
                                </tr>';
                      }
                  ?>
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card-body -->
        </div><!-- card -->

      </div><!-- sh-pagebody -->
      <div class="sh-footer">
        <div>Copyright &copy; 2018. Todos los derechos reservados.</div>
      </div><!-- sh-footer -->
    </div><!-- sh-mainpanel -->

    <div id="modaldemo1" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Pixels mailing</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-25">
            <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Pixel de Apertura</a></h4>
            <p id="pixelImpresion" class="mg-b-5"> </p>
          </div>

          <div class="modal-body pd-25">
            <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Pixel de Click</a></h4>
            <p id="pixelClick" class="mg-b-5"></p>
          </div>

          <div class="modal-body pd-25">
            <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Pixel de Conversión</a></h4>
            <p id="pixelConversion" class="mg-b-5"></p>
          </div>
         
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div id="modaldemo2" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Creatividad</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body pd-25">
            <p id="creativity" class="mg-b-5"></p>
          </div>
          
         
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/shamcey.js"></script>
    <script>
      $(function() {
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
