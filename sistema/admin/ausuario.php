<?php 
if (!isset($_SESSION)) {
  session_start();
}
include_once("../conect.php");
if($_SESSION['id_us']){
$idop=$_SESSION['id_us'];
$du=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where id_usuario=".$idop));
}else{
header("Location:index.php");
}//fin de if($_SESSION['cod_e']){
	
//actualizacion de producto
//************************//actualizar producto******************************
if($_POST['actualizar']){
    $nopermitidos = array("¬","*","$","#","%","&","=");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//echo "Key: $key; Value: $value<br />\n";
		$dat[$key] = trim($value);
	}
	if(mysqli_query($enlace,"update usuarios set nombre='".$dat['nombre']."',apellido='".$dat['apellido']."',cedula='".$dat['cedula']."',correo='".$dat['email']."',celular='".$dat['celular']."',telefono='".$dat['telefono']."',id_pais='".$dat['pais']."',id_provincia='".$dat['provincia']."',id_ciudad='".$dat['ciudad']."',direccion='".$dat['direccion']."',fecha_modificacion=NOW() where id_usuario=".$dat['actualizar'])){
		
			  $idu=$dat['actualizar'];
		header("Location:dusuario.php?u=".$idu."&in=3");	
	}else{
		 header("Location:dusuario.php?u=".$idu."&in=4");	
	}
}
////////////////////////fin de actualizar///////////////////////
$ru=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where id_usuario=".$_GET['u']));
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
            apellido: { required: true, minlength: 2},
            email: { required:true, email: true},
			cedula: { required:true},
            telefono: { required:true}
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

function ver_ciudades(p){
		 $('#dc').html('Cargando ..');
	     $('#dc').load("funciones.php", {id:p,op:1});
}
</script> 
</head>
<body onLoad="<?php if($_POST['actualizar']){ echo "actualizado()";}  ?>">
<table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td></td>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" role="form">
      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
        <tr>
          <td valign="top">Nombres<span class="text-danger">*</span><br>
            <input name="nombre" type="text" id="nombre" value="<?php echo $ru->nombre; ?>" size="30" title="Ingresar Nombres" ></td>
          <td valign="top">Apellidos<span class="text-danger">*</span><br>
            <input name="apellido" type="text" id="apellido" value="<?php echo $ru->apellido; ?>" size="30" title="Ingresar Apellidos"  ></td>
        </tr>
        <tr>
          <td valign="top">No. C&eacute;dula<span class="text-danger">*</span><br>
            <input name="cedula" type="text" id="cedula" title="Ingresar numero cedula" value="<?php echo $ru->cedula; ?>" size="30" /></td>
          <td valign="top">E-Mail<span class="text-danger">*</span><br>
            <input name="email" type="text" id="email" value="<?php echo $ru->correo; ?>" size="30" title="Ingresar E-mail v&aacute;lido"  ></td>
        </tr>
        <tr>
          <td valign="top">Celular<br>
            <input name="celular" type="text" id="celular" value="<?php echo $ru->celular; ?>" size="30" ></td>
          <td valign="top">Tel&eacute;fono<span class="text-danger">*</span><br>
            <input name="telefono" type="text" id="telefono" value="<?php echo $ru->telefono; ?>" size="30" title="Ingresar Tel&eacute;fono"  ></td>
        </tr>
        <tr>
          <td valign="top">Pais<br>
            <select name="pais" id="pais">
              <?php 
			  $cp=mysqli_query($enlace,"select * from tab_paises order by pais");
			  while($rp=mysqli_fetch_object($cp)){
			  ?>
              <option value="<?php echo $rp->id_pais; ?>" <?php if($rp->id_pais==$ru->id_pais){?>selected<?php } ?>><?php echo utf8_encode($rp->pais); ?></option>
              <?php } ?>
            </select></td>
          <td valign="top">Provincia<br>
            <select name="provincia" id="provincia" onChange="ver_ciudades(this.value)" style="width:200px">
              <option value="">-------</option>
              <?php 
			  $cp=mysqli_query($enlace,"select * from tab_provincias where id_pais=1 order by provincia");
			  while($rp=mysqli_fetch_object($cp)){
			  ?>
              <option value="<?php echo $rp->id_provincia; ?>" <?php if($rp->id_provincia==$ru->id_provincia){?>selected<?php } ?>><?php echo utf8_encode($rp->provincia); ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td valign="top">Ciudad<br>
            <div id="dc">
              <select name="ciudad" id="ciudad">
              <option value="">-------</option>
              <?php 
			  $cp=mysqli_query($enlace,"select * from tab_ciudades where id_provincia=".$ru->id_provincia." order by ciudad");
			  while($rp=mysqli_fetch_object($cp)){
			  ?>
              <option value="<?php echo $rp->id_ciudad; ?>" <?php if($rp->id_ciudad==$ru->id_ciudad){?>selected<?php } ?>><?php echo utf8_encode($rp->ciudad); ?></option>
              <?php } ?>
              </select>
            </div></td>
          <td valign="top">Direccion<br>
            <textarea name="direccion" cols="30" rows="2" id="direccion"><?php echo $ru->direccion; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><p><span class="text-danger">*Campo requerido</span></p></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="env" value="Guardar" class="btn btn-default" id="env"/>
            <input type="hidden" name="actualizar" id="actualizar" value="<?php echo $_GET['u'];?>">
          </div>
            <div class="progress progress-striped active" id="db" style="display:none">
              <div class="progress-bar" role="progressbar"
       aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
       style="width: 60%"></div>
            </div></td>
        </tr>
      </table>
    </form></td>
    <td></td>
  </tr>
</table>
</body>
</html>