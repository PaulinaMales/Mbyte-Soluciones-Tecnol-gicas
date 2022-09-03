<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_us']){
$idop=$_SESSION['id_us'];
$du=mysqli_fetch_object(mysqli_query("select * from usuarios where id_usuario=".$idop));
}else{
header("Location:index.php");
}//fin de if($_SESSION['cod_e']){
//datos del producto
$id_producto=sprintf("%d",$_GET['p']);
$tipo=sprintf("%d",$_GET['in']);
$rp=mysqli_fetch_object(mysqli_query($enlace,"select * from productos where id_producto=".$id_producto));
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
  <script src="../js/jquery.isloading.js"></script>
  <script src="../js/jquery.validate.js"></script>
</head>
<body>
<?php if($tipo==1){//mensaje ingreso exitoso ?>
  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>PRODUCTO INGRESADO</div>
  <?php }elseif($tipo==3){//mensaje actualizacion existoso ?>
  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>PRODUCTO ACTUALIZADO</div>
  <?php }elseif($tipo==2){ ?>
  <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>FALLO DE INGRESO</div>
  <?php } ?>
<table width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
  <td></td>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
      <tr>
        <td colspan="3" valign="bottom"><span class="text-primary">Categoría</span><br>
          <?php 
		  $c=mysqli_fetch_object(mysqli_query($enlace,"select categoria from tab_categorias where id_categoria=".$rp->id_categoria));
		  echo utf8_encode($c->categoria); ?></td>
        </tr>
      <tr>
        <td colspan="3" valign="bottom"><span class="text-primary">Item/Nombre</span><br>
          <?php echo $rp->item; ?></td>
        </tr>
        <tr>
          <td colspan="3" valign="top"><span class="text-primary">Descripci&oacute;n</span><br>
            <?php echo $rp->descripcion; ?></td>
          </tr>
        <tr>
          <td><span class="text-primary">Precio</span><br>
            <?php echo sprintf("%01.2f",$rp->costo); ?></td>
          <td><span class="text-primary">Precio Venta</span><br>
            <?php echo sprintf("%01.2f",$rp->precio); ?></td>
          <td><span class="text-primary">Unidades</span><br>
            <?php echo $rp->unidades; ?></td>
        </tr>
        <tr>
          <td colspan="3" valign="top">
                <span class="text-primary">Imagen</span><br>
                <?php if(file_exists('../imagenes/foto/'.$rp->imagen) and $rp->imagen!=''){ ?>
                <img src="../imagenes/foto/<?php echo $rp->imagen; ?>">
                <?php }else{ 
				       echo "No Disponible";
				}
				?>
                </td>
          </tr>
      </table>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>