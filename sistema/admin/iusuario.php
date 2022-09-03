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
//guardar usuario
if(isset($_POST['nombre'])){
$nopermitidos = array("¬","*","$","#","%","&","=","<",">");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//$dat[$key] = trim(str_replace($nopermitidos, "",$value));
			$dat[$key] = trim($value);
	}
	$n1=explode(" ",$dat['nombre']); 
	$noper= array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ");
	$clave=str_replace($noper, "", strtolower($n1[0])). rand(0,100);
  if(mysqli_query($enlace,"insert into usuarios values('','2','".$dat['nombre']."','".$dat['apellido']."','".$dat['cedula']."','','".$dat['celular']."','".$dat['telefono']."','".$dat['email']."','".$dat['pais']."','".$dat['provincia']."','".$dat['ciudad']."','".$dat['direccion']."','".md5($clave)."',NOW(),'','')")){
		  $idu=mysqli_insert_id($enlace);
		  $dest = $dat['email'];
		  
	//$head = "From: ".$_POST['email']."\r\n";
	$head = "From: info@grupoavila.com.ec \r\n";
		// Ahora creamos el cuerpo del mensaje
	$msg = "------------------------------- \n";
	$msg.= "        REGISTRO CLIENTE            \n";
	$msg.= "------------------------------- \n";
	$msg.= "CEDULA:   ".$dat['cedula']." (usuario de acceso)\n";
	$msg.= "CLIENTE:   ".$dat['nombre']." ".$dat['apellido']."\n";
	$msg.= "EMAIL:    ".$dat['email']."\n";
	//$msg.= "UBICACION: ".$dat['ciudad']."\n";
	//$msg.= "TELEFONO:    ".$dat['telefono']."\n";
	$msg.= "CLAVE:    ".$clave."\n\n\n";
	$msg.= "HORA:     ".date("h:i:s a ")."\n";
	$msg.= "FECHA:    ".date("D, d M Y")."\n";
		$msg.= " Mensaje creado por www.grupoavila.com.ec <br>";
	@mail($dest, "Nuevo Cliente", $msg, $head);
	
	
		// Ahora creamos el cuerpo del mensaje
	/*$msg = "------------------------------- <br>";
	$msg.= "        REGISTRO CLIENTE            <br>";
	$msg.= "------------------------------- <br>";
	$msg.= "CEDULA:   ".$dat['cedula']." (usuario de acceso)<br>";
	$msg.= "CLIENTE:   ".$dat['nombre']." ".$dat['apellido']."<br>";
	$msg.= "EMAIL:    ".$dat['email']."<br>";
	//$msg.= "UBICACION: ".$dat['ciudad']."\n";
	//$msg.= "TELEFONO:    ".$dat['telefono']."\n";
	$msg.= "CLAVE:    ".$clave."<br><br><br>";
	$msg.= "HORA:     ".date("h:i:s a ")."<br>";
	$msg.= "FECHA:    ".date("D, d M Y")."<br>";
		$msg.= " Mensaje creado por www.grupoavila.com.ec <br>";
	include("../phpmail/mailer.php");	
	 envio_email($dest,"Nuevo Cliente",$msg);*/
	 
    header("Location:dusuario.php?u=".$idu."&in=1");	
  }else{
   header("Location:dusuario.php?u=".$idu."&in=2");	
  }
}
//fin de guardar usuario
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
function validar(c){
	//alert('validando ' + c);
	$('#dced').load("funciones.php", {id:c,op:2});
}
</script> 
</head>
  <body>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
  <td></td>
    <td>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" role="form">
     <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#F4F4F4"  bgcolor="#F4F4F4">
          <tr>
            <td valign="top">Nombres<span class="text-danger">*</span><br>
            <input name="nombre" type="text" id="nombre" value="<?php echo $_POST['na']; ?>" size="30" title="Ingresar Nombres" ></td>
            <td valign="top">Apellidos<span class="text-danger">*</span><br>
            <input name="apellido" type="text" id="apellido" value="<?php echo $_POST['na']; ?>" size="30" title="Ingresar Apellidos"  ></td>
          </tr>
          <tr>
            <td valign="top">No. Identificación<span class="text-danger">*</span><br>
            <input name="cedula" type="text" id="cedula" size="30" title="Ingresar numero cedula" onBlur="validar(this.value)" />
            <div id="dced"></div>
            </td>
            <td valign="top">E-Mail<span class="text-danger">*</span><br>
            <input name="email" type="text" id="email" value="<?php echo $_POST['ea']; ?>" size="30" title="Ingresar E-mail válido"  ></td>
          </tr>
          <tr>
            <td valign="top">Celular<br>
            <input name="celular" type="text" id="celular" value="<?php echo $_POST['ea']; ?>" size="30" ></td>
            <td valign="top">Tel&eacute;fono<span class="text-danger">*</span><br>
            <input name="telefono" type="text" id="telefono" value="<?php echo $_POST['ta']; ?>" size="30" title="Ingresar Teléfono"  ></td>
          </tr>
          <tr>
            <td valign="top">Pais<br>
              <select name="pais" id="pais">
              <?php 
			  $cp=mysqli_query($enlace,"select * from tab_paises order by pais");
			  while($rp=mysqli_fetch_object($cp)){
			  ?>
              <option value="<?php echo $rp->id_pais; ?>" <?php if($rp->pais=='ECUADOR'){?>selected<?php } ?>><?php echo utf8_encode($rp->pais); ?></option>
              <?php } ?>
            </select></td>
            <td valign="top">Provincia<br>
              <select name="provincia" id="provincia" onChange="ver_ciudades(this.value)" style="width:200px">
              <option value="">-------</option>
              <?php 
			  $cp=mysqli_query($enlace,"select * from tab_provincias where id_pais=1 order by provincia");
			  while($rp=mysqli_fetch_object($cp)){
			  ?>
              <option value="<?php echo $rp->id_provincia; ?>"><?php echo utf8_encode($rp->provincia); ?></option>
              <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td valign="top">Ciudad<br>
              <div id="dc"><select name="ciudad" id="ciudad">
            </select></div></td>
            <td valign="top">Direccion<br>
            <textarea name="direccion" cols="30" rows="2" id="direccion"></textarea></td>
          </tr>
          <tr> 
            <td colspan="2"> 
              <p><span class="text-danger">*Campo requerido</span></p>                </td>
          </tr>
          <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="env" value="Guardar" class="btn btn-default" id="env" />
          </div>
          <div class="progress progress-striped active" id="db" style="display:none">
  <div class="progress-bar" role="progressbar"
       aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
       style="width: 60%">
  </div>
</div>
          </td>
        </tr>
        </table>
    </form>	</td>
    <td></td>
  </tr>
</table>
</body>
</html>