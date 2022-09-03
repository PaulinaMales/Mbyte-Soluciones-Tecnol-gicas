<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_usu']){
$idop=$_SESSION['id_usu'];
$du=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where id_usuario=".$idop));
}else{
header("Location:../index.php");
}//fin de if($_SESSION['cod_e']){
//Vista datos del pedido
$mes=array("Ene.","Feb.","Mar.","Abr.","May.","Jun.","Jul.","Ago.","Sep.","Oct.","Nov.","Dic.");
$id_pedido=sprintf("%d",$_GET['ip']);
$tipo=sprintf("%d",$_GET['in']);
$rp=mysqli_fetch_object(mysqli_query($enlace,"select * from pedidos where id_pedido=".$id_pedido));
$sqldp=mysqli_query($enlace,"select * from detalle_pedidos where id_pedido=".$id_pedido);
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
    <style media="print">
		.noPrint{
		display: none;
		}
		.yesPrint{
		display: block !important;
		}
		</style>
    
</head>
  <body>
  <?php if($tipo==1){//mensaje ingreso nuevo pedido 
  
  ?>
  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>PEDIDO INGRESADO</div>
  <?php } ?>
  <img src="../imagenes/logo-grupo-avila.png" class="yesPrint" style="display:none" width="109" height="35" alt=""/>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td></td>
    <td>
    <table width="100%" border="0">
  <tbody>
    <tr>
      <td><h3><span class="yesPrint" style="display:none">Pedido </span>No. <?php echo sprintf("%'.05d\n", $rp->id_pedido); ?></h3></td>
      <td align="right" class="noPrint"><a class="btn btn-default btn-xs" href="Javascript:window.print()"><span class="glyphicon glyphicon-print"></span> Imprimir</a></td>
    </tr>
  </tbody>
</table>

    </td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td><table width="100%" border="0">
  <tbody>
    <tr>
      <td><strong>Cliente : </strong><?php 
			$rc=mysqli_fetch_object(mysqli_query($enlace,"select nombre,apellido from usuarios where id_usuario=".$rp->id_usuario));
			echo $rc->nombre." ".$rc->apellido;
			?></td>
      <td align="right"><strong>Fecha : </strong><?php 
		  $fecha_1=explode(" ",$rp->fecha_creacion);
		  $fecha=explode("-",$fecha_1[0]);
		  echo $mes[$fecha[1]-1]." ".$fecha[2].", ".$fecha[0]; ?></td>
    </tr>
  </tbody>
</table>
</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td><form action="ipedido.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table class="table">
        <tbody>
          <tr>
            <th>Item</th>
            <th><div align="right">Precio Unit.</div></th>
            <th><div align="right">Cantidad</div></th>
            <th><div align="right">Subtotal</div></th>
            </tr>
          <?php 
		  $detalle='';
		   while($rdp=mysqli_fetch_object($sqldp)){
			   $detalle.=$rdp->item."(".$rdp->cantidad."), ";
		   ?>
          <tr>
            <td><?php echo $rdp->item; ?></td>
            <td align="right"><?php echo sprintf("%01.2f",$rdp->precio); ?></td>
            <td align="right"><?php echo $rdp->cantidad; ?></td>
            <td align="right"><?php echo sprintf("%01.2f",$rdp->subtotal); ?></td>
            </tr>
  <?php 
 }

?>       
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>Total</strong></td>
            <td align="right"><?php echo sprintf("%01.2f",$rp->precio_total); ?></td>
            </tr>
          </tbody>
        </table>
    </form></td>
    <td></td>
  </tr>
</table>

<?php if($tipo==1){//mensaje ingreso nuevo pedido 
  
  // Ahora creamos el cuerpo del mensaje correo solicitud de pedido a los administradores
	  
	$msg = "------------------------------- <br>";
	$msg.= "        Nuevo Pedido           <br>";
	$msg.= "------------------------------- <br>";
	$msg.= "No.:   ".sprintf("%'.05d\n", $rp->id_pedido)." <br>";
	$msg.= "Cliente:   ".$du->nombre." ".$du->apellido."<br>";
	$msg.= "Detalle:    ".trim($detalle,", ")."<br>";
	$msg.= "Valor Total:    ".$rp->precio_total."<br>";
	$msg.= "FECHA:    ".date("d/m/Y")."<br><br>";
		$msg.= " Mensaje creado por www.grupoavila.com.ec <br>";
	include("../phpmail/mailer.php");	
	
	$sqla=mysqli_query($enlace,"select correo from usuarios where id_perfil=1");
	while($dest=mysqli_fetch_object($sqla)){
		if($dest->correo!=''){
	     envio_email($dest->correo,"Nuevo Pedido ".sprintf("%'.05d\n", $rp->id_pedido),$msg);
		}
	}
	
 } ?>

</body>
</html>