<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_us']){
$idop=$_SESSION['id_us'];
$du=mysql_fetch_object(mysql_query("select * from usuarios where idus=".$idop));
}else{
header("Location:../index.php");
}//fin de if($_SESSION['cod_e']){
//Vista datos del usuario
$id_usuario=sprintf("%d",$_GET['u']);
$tipo=sprintf("%d",$_GET['in']);
$ru=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where id_usuario=".$id_usuario));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../imagenes/favicon.gif">

    <title>GRUPO AVILA</title>
    <!-- CSS de Bootstrap -->
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    
</head>
  <body>
  <?php if($tipo==1){//mensaje ingreso nuevo usuario ?>
  <div class="alert alert-success"><span class="glyphicon .glyphicon-ok"></span>USUARIO INGRESADO</div>
  <?php } ?>
  <?php if($tipo==3){//mensaje actualizacion usuario ?>
  <div class="alert alert-success"><span class="glyphicon .glyphicon-ok"></span>USUARIO ACTUALIZADO</div>
  <?php } ?>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
  <td></td>
    <td>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" role="form">
     <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
          <tr>
            <td valign="top"><span class="text-primary">Nombres</span><br><?php echo $ru->nombre; ?></td>
            <td valign="top"><span class="text-primary">Apellidos</span><br>
            <?php echo $ru->apellido; ?></td>
          </tr>
          <tr>
            <td valign="top"><span class="text-primary">No. Identificación</span><br>
            <?php echo $ru->cedula; ?></td>
            <td valign="top"><span class="text-primary">E-Mail</span><br>
            <?php echo $ru->correo; ?></td>
          </tr>
          <tr>
            <td valign="top"><span class="text-primary">Celular</span><br>
            <?php echo $ru->celular; ?></td>
            <td valign="top"><span class="text-primary">Tel&eacute;fono</span><br>
            <?php echo $ru->telefono; ?></td>
          </tr>
          <tr>
            <td valign="top"><span class="text-primary">Pais</span><br>
            <?php 
			$rp=mysqli_fetch_object(mysqli_query($enlace,"select pais from tab_paises where id_pais=".$ru->id_pais));
			echo $rp->pais; ?></td>
            <td valign="top"><span class="text-primary">Provincia</span><br>
            <?php 
			$rp=mysqli_fetch_object(mysqli_query($enlace,"select provincia from tab_provincias where id_provincia=".$ru->id_provincia));
			echo $rp->provincia; ?></td>
          </tr>
          <tr>
            <td valign="top"><span class="text-primary">Ciudad</span><br>
              <div id="dc">
                <?php 
			$rp=mysqli_fetch_object(mysqli_query($enlace,"select ciudad from tab_ciudades where id_ciudad=".$ru->id_ciudad));
			echo $rp->ciudad; ?>
            </div></td>
            <td valign="top"><span class="text-primary">Dirección</span><br>
            <?php echo $ru->direccion; ?></td>
          </tr>
          <tr> 
            <td colspan="2"> 
              <p>&nbsp;</p>                </td>
          </tr>
        </table>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>