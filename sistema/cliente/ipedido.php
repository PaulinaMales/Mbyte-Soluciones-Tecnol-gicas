<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_usu']){
$idop=$_SESSION['id_usu'];
$du=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where id_usuario=".$idop));
}else{
header("Location:index.php");
}//fin de if($_SESSION['cod_e']){
$carrito = new Carrito();
if($_GET['p']){//añadir/actualizar item de catalogo o de carrito
$id_producto=sprintf("%d",$_GET['p']);
  if($_GET['c']){
	  $cantidad=$_GET['c'];
	  //borramos elemento de carro para agregar nuevamente con otra cantidad
	  $carrito->remove_producto($_GET['ip']);
  }else{
	  $cantidad=1;
  }
$rp=mysqli_fetch_object(mysqli_query($enlace,"select * from productos where id_producto=".$id_producto));
//array que crea un producto
$articulo = array(
		"id"			=>		$rp->id_producto,
		"cantidad"		=>		$cantidad,
		"precio"		=>		$rp->precio,
		"nombre"		=>		$rp->item
	);
 
//añadir el producto
$carrito->add($articulo);
}//fin de añadir item de catalogo

if($_GET['di']){//Borrar item de pedido
  $carrito->remove_producto($_GET['di']);
}

//guardar pedido
if(isset($_POST['env'])){
	$carro=$carrito->get_content();
    if($carro)
    {
	   	$precio_total=$carrito->precio_total();
		$cantidad_total=$carrito->articulos_total();
		mysqli_query($enlace,"insert into pedidos values('',".$du->id_usuario.",".$precio_total.",".$cantidad_total.",NOW())");
		$id_pedido=mysqli_insert_id($enlace);
		foreach($carro as $producto)  
		{
			mysqli_query($enlace,"insert into detalle_pedidos values('',".$id_pedido.",".$producto['id'].",'".$producto['nombre']."',".$producto['precio'].",".$producto['cantidad'].",".$producto['total'].")");
			mysqli_query($enlace,"update productos set unidades=(unidades-".$producto['cantidad'].") where id_producto=".$producto['id']);
		}
	  $carrito->destroy();
	  
	  
	   header("Location:dpedido.php?in=1&ip=".$id_pedido);	
	}
}
//fin de guardar producto
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
    
    <script type="text/javascript">
$(document).ready(function() {
    //$("#ok").hide();

    $("#form1").validate({
		errorClass: "text-danger",
		errorElement: "div",
        rules: {
            nombre: { required: true, minlength: 2},
        },
        messages: {
            //nombre: 'Debe introducir su nombre.',
        },
        submitHandler: function(form){
			$("#env").val('Enviando informacion');
			$("#env").attr("disabled", true);
			/*$.isLoading({
                       text: "Cargando",
                       position: "overlay"
                      });*/
			 form.submit();
			
			//$("#db").css("display", "block");
            //var dataString = 'name='+$('#name').val()+'&lastname='+$('#lastname').val()+'...';
          /*  $.ajax({
                type: "POST",
                url:"send.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });*/
        }
    });
});
function enviof(c,p,ip){
	window.location.href='ipedido.php?p=' + p + '&c=' + c + '&ip=' + ip;
}
</script> 
</head>
<body>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td></td>
    <td>Items del Pedido</td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td><form action="ipedido.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table class="table">
        <tbody>
          <tr>
            <th>Item</th>
            <th>Precio Unit.</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
          </tr>
          <?php $carro=$carrito->get_content();
if($carro)
{
	foreach($carro as $producto)
	{
		   ?>
          <tr>
            <td><?php echo $producto["nombre"]; ?></td>
            <td><?php echo sprintf("%01.2f",$producto["precio"]); ?></td>
            <td>
            <select name="cantidad" id="cantidad" onChange="enviof(this.value,'<?php echo $producto["id"]; ?>','<?php echo $producto["unique_id"]; ?>')">
            <?php for($i=1;$i<100;$i++){ ?>
              <option value="<?php echo $i; ?>" <?php if($producto["cantidad"]==$i){ ?>selected<?php } ?>><?php echo $i; ?></option>
              <?php } ?>
            </select>
            </td>
            <td><?php echo sprintf("%01.2f",$producto["total"]); ?></td>
            <td><a href="ipedido.php?di=<?php echo $producto["unique_id"]; ?>" class="btn btn-danger btn-xs" title="Quitar">Quitar</a></td>
          </tr>
<?php 
 }
}
?>       
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>Total</strong></td>
            <td><?php echo sprintf("%01.2f",$carrito->precio_total()); ?></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <?php if($carro){ ?>
      <input type="submit" name="env" value="Finalizar Pedido" class="btn btn-default" id="env" style="float:right"/>
      <?php } ?>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>