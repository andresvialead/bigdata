<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/usuarios/ctrl_usuarios.php');
require_once('../funciones/login-resp.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
<title>BigData</title>

<script type="text/javascript">
    function entrar(){  


      var username="prueba";
      var password="1Manager";
        /*var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;*/
        $.ajax({                        
              type: "POST",                 
              url: '../funciones/login-resp.php',                     
              data: {username:username,password:password}, 
              beforeSend: function () {
                        console.log("Esperando respuesta...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                       
                if(response=="true"){
                  window.location.replace("../app/inicio.php");
                }else{
                  console.log("HOLA")
                }
                        

                        
              },
              error:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        console.log("ERROR sda");
              }
          });

       
   }
</script>



</head>

<body >

<div >
    <div>
        
       <!--<div> <img src='/img/logo.png' style='background: white; padding: 10px 50px; border-radius: 10px; margin-bottom:50px;' /></div>-->
        <form id="entrar" name="myform" action="#" method="POST" onSubmit="return entrar()">
            
            
            <div>
                <input type="text" name="user" id="username" placeholder="Introduce el usuario" />
            </div>
            <div>
                <input type="password" name="pass" id="password" placeholder="Introduce la contraseña" />
            </div>
            <div>
                <button  name="submit">Entrar</button>
            </div>

            
        </form>
        
    </div>
</div>

<div>
    <p>&copy; 2018. ViaLeadGeneration S.L. Todos los derechos reservados.</p>
</div>

</body>
</html>
