<?php  
if (!isset($_SESSION)) {
  session_start();
}
include_once("./conect.php");
$error='';
//codigo proceso login
if($_POST['cl']!='' and $_POST['us']!=''){
       if(get_magic_quotes_gpc()) {
            $usuario= stripslashes(strip_tags($_POST['us']));
            $clave=stripslashes(strip_tags($_POST['cl']));
        } else {
            $usuario= strip_tags($_POST['us']);
            $clave=strip_tags($_POST['cl']);
        }
        $consultacceso = sprintf("select id_usuario,id_perfil from usuarios where cedula='%s' and clave='%s' and estado=0",mysqli_real_escape_string($enlace,$usuario),mysqli_real_escape_string($enlace,md5($clave)));
        $acceso=mysqli_query($enlace,$consultacceso);
        $row=mysqli_fetch_object($acceso);
	if($row!='' and $row->id_perfil==1){//Modulo Administrador
	$idop=$row->id_usuario;
	//guardamos datos de acceso
    mysqli_query($enlace,"insert into acceso values('','$idop',Now(),'','a')");
	$sql_ida=mysqli_query($enlace,"SELECT LAST_INSERT_ID( ) AS ida FROM acceso");
	$ida=mysqli_fetch_object($sql_ida);
	$_SESSION['id_a']=$ida->ida;//recuperamos y guradamos el id de acceso
	//redireccion a modulo
		$_SESSION['id_us']=$idop;
		header("Location:admin/index_1.php");
	}elseif($row!='' and $row->id_perfil==2){//Modulo Cliente
	$idop=$row->id_usuario;
	//guardamos datos de acceso
    mysqli_query($enlace,"insert into acceso values('','$idop',Now(),'','u')");
	$sql_ida=mysqli_query($enlace,"SELECT LAST_INSERT_ID( ) AS ida FROM acceso");
	$ida=mysqli_fetch_object($sql_ida);
	$_SESSION['id_a']=$ida->ida;//recuperamos y guradamos el id de acceso
	//redireccion a modulo
		$_SESSION['id_usu']=$row->id_usuario;
		header("Location:cliente/index_1.php");	
	}else{
		$error="Usuario y Clave Ingresada es incorrecta ";
		}//fin de if($row!=''){ 
}//fin de if($_POST['cl']!='' and $_POST['us']!=''){
?>

<!DOCTYPE html>
<html lang="en">
  <head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Mbyte Soluciones Tecnológicas</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
        <link rel="stylesheet" href="../estilos/styles-components.css">
        



    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
    <link rel="icon" href="../imagenes/logo-grupo-mbyte.png">

    <!-- CSS de Bootstrap -->
    <script src="./js/jquery.js"></script>

    <script language="javascript">
	   function recupera_clave(v){
		   if(v==1){
			   $("#dclave").css('display','block');
			   $("#dlogin").css('display','none');
		   }
		   if(v==2){
			   $("#dclave").css('display','none');
			   $("#dlogin").css('display','block');
		   }
	   }
$(document).ready(function () {

    $("#fclave").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#btnenviar");
		var vemail = $("#email").val();
		$('#respuesta').html('<div class="alert alert-info">Enviando .....</div>');
	     $('#respuesta').load("rclave.php", { email:vemail });
		 // Nos permite cancelar el envio del formulario
        return false;
    });
});
	</script>

    
  </head>

  <body>

        <!-- INICIO DEL HEADER -->
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img class="logo-img" src="../images/logo_ 1.png" alt="logo" class="d-inline-block align-text-top">
                  Mbyte Soluciones Tecnológicas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">☰</span>
                </button>
      
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Acerca de</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Contacto</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="../catalogo_mb.php">Catálogo</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Iniciar Sesión</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="../register.html">Registrarse</a>
                    </li>    
                </ul>
                </div>
              </div>
            </nav>
          </header>
          <!-- FIN DEL HEADER -->



      <!-- START LOGIN -->
  <section class="form container"  id="login" style="margin-top:150px;">
    <div class="form__container container">
      <div class="form__card container">

       

      <div id="dlogin">
      <form action="index.php" method="post" name="flogin">
        <?php if($error!=''){ echo '<div class="alert alert-danger">'.$error.'</div>'; } ?>

          <div >
            <p class="title-form wg-title center-text">INICIAR SESIÓN</p>
            <span>Ingresa tu usuario</span>
            <div class="form-group">

            <label for="us" class="label  wg-title">Usuario</label>
             <input type="text" id="us" name="us" class="form-camp" placeholder="Usuario" required autofocus>

            </div>

            <div class="form-group">
              <label class="sr-only" for="password">Contraseña</label>
              <input type="current-password" class="form-camp" name="cl" id="email-login" placeholder="Contraseña">
            </div>

          </div>

          <div class="part2">
            <p class="form-text"><a href="#" onClick="recupera_clave('1')">Recuperar Cuenta</a></p>
            <div class="form-group boton-shop btn-form">
              <input type="submit" value="Ingresar" class="btn btn-form wg-title">
              <div class="submitting"></div>
            </div>

          </div>
        </form>
      </div>







        <div id="dclave" style="display:none;">

        <form class="form-signin" action="rclave.php" method="post" name="fclave" id="fclave">
         <div id="respuesta"></div>
        <h4 class="form-signin-heading">Recuperar Clave</h4>
        <label for="email" class="sr-only">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Ingrese E-mail" required autofocus>
        <button class="btn btn-primary" type="submit" id="btnenviar">Enviar</button>
        <button class="btn btn-primary" type="button" onClick="recupera_clave('2')">Salir</button>
      </form>


        </div>
        




      </div>
    </div>
  </section>
  <!-- FIN LOGIN -->

  
  <!-- INICIO DEL FOOTER  -->
  <footer>
    <div class="footer-social-media">
      <a class="footer-logo" href="#">
        <img class="logo-img" src="./images/logo_ 1.png" alt="logo" class="d-inline-block align-text-top">
        Mbyte Soluciones Tecnológicas
      </a>
      <div class="social-media">
        <a href=""><iconify-icon icon="dashicons:whatsapp"></iconify-icon></a>
        <a href=""><iconify-icon icon="akar-icons:facebook-fill"></iconify-icon></a>
        <a href=""><iconify-icon icon="ant-design:instagram-filled"></iconify-icon></a>
        <a href=""><iconify-icon icon="akar-icons:tiktok-fill"></iconify-icon></a>
      </div>
    </div>
    <div class="footer-contact">
      <h6 class="footer-title">Contacto</h6>
      <p>Dirección
        <br> &nbsp;&nbsp;&nbsp;&nbsp;Av. Ladrón Guevara 253
      </p>
      <p>Quito, 170517</p>
      <p>electrónicaepn@gmail.com</p>
    </div>
    <div class="footer-shop">
      <h6 class="footer-title center-text">Catálogo</h6>
      <div class="boton-shop">
        <a href="catalogo.html">Ir al Catálogo ></a>
      </div>
    </div>
  </footer>
  <!-- FIN DEL FOOTER  -->


  </body>
</html>