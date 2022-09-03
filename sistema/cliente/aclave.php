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
	
//************************//actualizar clave******************************
if($_POST['clave']!='' and $_POST['clave']==$_POST['nclave']){
    //$nopermitidos = array("¬","*","$","#","%","&","=");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//echo "Key: $key; Value: $value<br />\n";
		$dat[$key] = trim($value);
	}
	if(mysqli_query($enlace,"update usuarios set clave='".md5($dat['clave'])."',fecha_modificacion=NOW() where id_usuario=".$du->id_usuario)){
		header("Location:aclave.php?in=1");	
	}else{
		 header("Location:aclave.php?in=2");	
	}
}
////////////////////////fin de actualizar///////////////////////
$tipo=sprintf("%d",$_GET['in']);
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
    $("#form1").validate({
		errorClass: "text-danger",
		errorElement: "div",
        rules: {
            clave: { required: true, minlength: 2},
            nclave: { required: true, minlength: 2, equalTo: "#clave"}
			
        },
        messages: {
            //nombre: 'Debe introducir su nombre.',
        },
        submitHandler: function(form){
			$("#env").val('Enviando informacion');
			$("#env").attr("disabled", true);
			 form.submit();
        }
    });
});
</script> 
</head>
<body>
<?php if($tipo==1){//mensaje nueva clave actualizada ?>
  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> CLAVE ACTUALIZADA</div>
  <?php }elseif($tipo==2){//mensaje fallo cambio clave ?>
<div class="alert alert-danger">FALLO CAMBIO DE CLAVE</div>
  <?php }else{ ?>
<table width="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td></td>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" role="form">
      <table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
        <tr>
          <td valign="top">Nueva Clave<span class="text-danger">*</span><br>
            <input name="clave" type="password" id="clave" size="30" title="Ingresar Nueva Clave"  >
          </td>
          </tr>
        <tr>
          <td valign="top">Repetir Nueva Clave<span class="text-danger">*</span><br>
            <input name="nclave" type="password"  id="nclave" size="30" title="Repetir Nueva Clave correctamente"  >
          </td>
          </tr>
        <tr>
          <td><div align="center">
            <input type="submit" name="env" value="Guardar" class="btn btn-default" id="env"/>
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
<?php }//fin de  if($tipo==1){ ?>
</body>
</html>