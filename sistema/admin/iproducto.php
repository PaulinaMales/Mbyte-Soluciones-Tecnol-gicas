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
//guardar producto
if(isset($_POST['nombre'])){
   $nopermitidos = array("¬","*","$","#","%","&","=","<",">");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//$dat[$key] = trim(str_replace($nopermitidos, "",$value));
			$dat[$key] = trim($value);
	}
		$imagen= $_FILES['imagen']['name'];
       if($imagen!=''){
		$fotos.=subir_imgp($_FILES['imagen']);
		}
  if(mysqli_query($enlace,"insert into productos (id_categoria,item,descripcion,unidades,costo,precio,imagen,fecha_creacion) values('".$dat['categoria']."','".$dat['nombre']."','".$dat['descripcion']."','".$dat['unidades']."','".$dat['costo']."','".$dat['precio']."','".$fotos."',NOW())")){
		  $idp=mysqli_insert_id($enlace);
  header("Location:dproducto.php?in=1&p=".$idp);	
  }else{
    //echo mysqli_error($enlace);
   header("Location:iproducto.php?in=2&p=".$idp);	
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
          <option value="<?php echo $c->id_categoria; ?>"><?php echo utf8_encode($c->categoria); ?></option>
          <?php } ?>
          </select></td>
        </tr>
      <tr>
        <td colspan="3" valign="bottom">Item/Nombre<span class="text-danger">*</span><br>
          <input name="nombre" type="text" id="nombre" value="" size="50" />
          </td>
        </tr>
        <tr>
          <td colspan="3" valign="top">Descripci&oacute;n<br>
            <textarea name="descripcion" cols="60" rows="3" id="descripcion"></textarea></td>
          </tr>
        <tr>
          <td>Precio<br>
            <input name="costo" type="text" id="costo" value="" size="10" maxlength="15" /></td>
          <td>Precio Venta<br>
            <input name="precio" type="text" id="precio" value="" size="10" maxlength="15" />
            </td>
          <td>Unidades<br>
            <input name="unidades" type="text" id="unidades" value="" size="10" maxlength="15" />
            </td>
        </tr>
        <tr>
          <td colspan="3" valign="top">
                Imagen
                <input name="imagen" type="file" id="imagen" class="input-file" size="200">
                <span class="help-block">(archivo .jpg o .gif , tama&ntilde;o m&aacute;ximo 200KB)</span>
                </td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input type="submit" name="env" value="Guardar" class="btn btn-default" id="env"/>
          </div></td>
        </tr>
      </table>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>