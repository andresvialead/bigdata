<?php 

session_start();
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/usuarios/ctrl_usuarios.php');
require_once('../funciones/login-resp.php');



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


    <title>Iniciar Sesión</title>

    <!-- Vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="../css/shamcey.css">


    <script type="text/javascript">
      
      function entrar(){  
      
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      
        $.ajax({                        
              type: "POST",                 
              url: '../funciones/login-resp.php',                     
              data: {username:username,password:password}, 
              beforeSend: function () {
                        console.log("Esperando respuesta...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                if(response!='false'){
                  window.location.replace("../app/inicio.php");
                }else{
                  console.log("HOLA")
                }
                                           
              },
              error:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        console.log("ERROR sda");
              }
          });

        return false;
   }

    </script>
  </head>

  <body class="bg-gray-900">

    <div class="signpanel-wrapper">
      <div class="signbox">
        <div class="signbox-header">
          <h2>ViaLeadGeneration</h2>
          <p class="mg-b-0">Bigdata</p>
        </div><!-- signbox-header -->
        <div class="signbox-body">
          <div class="form-group">
            <label class="form-control-label">Usuario:</label>
            <input type="text" name="username" id="username" placeholder="Enter your user" class="form-control">
          </div><!-- form-group -->
          <div class="form-group">
            <label class="form-control-label">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control">
          </div><!-- form-group -->
          <!--<div class="form-group">
            <a href="">Forgot password?</a>
          </div>form-group -->
          <input type="submit"  class="btn btn-success btn-block" onclick="entrar()" value="Sign In">
          <!--<div class="tx-center bg-white bd pd-10 mg-t-40">Not yet a member? <a href="page-signup.html">Create an account</a></div>-->
        </div><!-- signbox-body -->
      </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

    <script src="../js/shamcey.js"></script>
  </body>
</html>
