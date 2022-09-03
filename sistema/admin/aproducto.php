<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_us']){
$idop=$_SESSION['id_us'];
$du=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where idus=".$idop));
}else{
header("Location:../index.php");
}//fin de if($_SESSION['cod_e']){
	
//actualizacion de producto
//************************//actualizar producto******************************
if($_POST['actualizar']){
	$imagen= $_FILES['imagen']['name'];
       if($imagen!=''){
		$fotos.=subir_imgp($_FILES['imagen']);
		unlink("../imagenes/foto/". $_POST['imageno']);
		}else{
		$fotos.=$_POST['imageno'];
		}
    //$nopermitidos = array("¬","*","$","#","%","&","=");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//echo "Key: $key; Value: $value<br />\n";
		$dat[$key] = trim($value);
	}
	if(mysqli_query($enlace,"update productos set id_categoria='".$dat['categoria']."',item='".$dat['nombre']."',imagen='".$fotos."',descripcion='". mysqli_real_escape_string($enlace,$dat['descripcion']) ."',costo='". $dat['costo'] ."',precio='". $dat['precio'] ."', unidades='". $dat['unidades'] ."', fecha_modificacion=NOW() where id_producto=".$dat['actualizar'])){
		
			  $idp=$dat['actualizar'];
		 header("Location:dproducto.php?in=3&p=".$idp);	
	}else{
		 header("Location:iproducto.php?in=2&p=".$idp);
	}
}
////////////////////////fin de actualizar///////////////////////
$rp=mysqli_fetch_object(mysqli_query($enlace,"select * from productos where id_producto=".$_GET['p']));
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
			categoria: { required: true}
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

$(document).ready(function (){
   /* Valida el tamaño maximo de un archivo adjunto */
   $('.input-file').change(function (){
     var sizeByte = this.files[0].size;
     var siezekiloByte = parseInt(sizeByte / 1024);

     if(siezekiloByte > $(this).attr('size')){
         alert('El tamaño supera el limite permitido. La imagen no será ingresada');
         $(this).val('');
     }
   });
});
</script> 
</head>
<body>
<table width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
  <td></td>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
      <tr>
        <td colspan="3" valign="bottom">Categoría<span class="text-danger">*</span><br>
          <select name="categoria" id="categoria" style="width:200">
            <option value="">--------------</option>
          <?php $rc=mysqli_query($enlace,"select * from tab_categorias order by categoria"); 
		  while($c=mysqli_fetch_object($rc)){
		  ?>
          <option value="<?php echo $c->id_categoria; ?>" <?php if($c->id_categoria==$rp->id_categoria){ echo "selected"; } ?>><?php echo utf8_encode($c->categoria); ?></option>
          <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td colspan="3" valign="bottom">Item/Nombre<span class="text-danger">*</span><br>
          <input name="nombre" type="text" id="nombre" value="<?php echo $rp->item; ?>" size="50" />
          </td>
        </tr>
        <tr>
          <td colspan="3" valign="top">Descripci&oacute;n<br>
            <textarea name="descripcion" cols="60" rows="3" id="descripcion"><?php echo $rp->descripcion; ?></textarea></td>
          </tr>
        <tr>
          <td>Precio<br>
            <input name="costo" type="text" id="costo" value="<?php echo $rp->costo; ?>" size="10" maxlength="15" /></td>
          <td>Precio<br>
            <input name="precio" type="text" id="precio" value="<?php echo $rp->precio; ?>" size="10" maxlength="15" />
            </td>
          <td>unidades<br>
            <input name="unidades" type="text" id="unidades" value="<?php echo $rp->unidades; ?>" size="10" maxlength="15" />
            </td>
        </tr>
        <tr>
          <td colspan="3" valign="top">
                Imagen
                <?php if(file_exists('../imagenes/foto/'.$rp->imagen) and $rp->imagen!=''){ ?>
                  <div class="col-sm-2"><div class="thumbnail"><img src="../imagenes/foto/<?php echo $rp->imagen; ?>"></div></div>
                  <?php } ?>
                <input name="imageno" type="hidden" id="imageno" value="<?php echo $rp->imagen; ?>">
                <input name="imagen" type="file" id="imagen" class="input-file" size="200"><span class="help-block">(archivo .jpg o .gif , tama&ntilde;o m&aacute;ximo 200KB)</span>
                </td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input type="submit" name="env" value="Guardar" class="btn btn-default" id="env"/>
            <input name="actualizar" type="hidden" id="actualizar" value="<?php echo $rp->id_producto; ?>">
          </div></td>
        </tr>
      </table>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>