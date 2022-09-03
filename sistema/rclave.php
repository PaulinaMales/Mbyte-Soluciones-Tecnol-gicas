<?php 
include_once("./conect.php");
	
//************************//recuperar clave******************************
if($_POST['email']!=''){
    //$nopermitidos = array("¬","*","$","#","%","&","=");//caracteres no permitidos
	foreach ($_POST as $key => $value) {
		//echo "Key: $key; Value: $value<br />\n";
		$dat[$key] = trim($value);
	}
	$rc=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios where correo='".$dat['email']."'"));
	if($rc->nombre!=''){
	  $noper= array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ");
	  $clave=str_replace($noper, "", strtolower($rc->nombre)). rand(0,100);
	  // Ahora creamos el cuerpo del mensaje
	  $msg = "------------------------------- <br>";
	  $msg.= "        NUEVA CLAVE CLIENTE            <br>";
	  $msg.= "------------------------------- <br>";
	  $msg.= "CEDULA:   ".$rc->cedula." (usuario de acceso)<br>";
	  $msg.= "CLIENTE:   ".$rc->nombre." ".$rc->apellido."<br>";
	  $msg.= "EMAIL:    ".$dat['email']."<br>";
	  $msg.= "CLAVE:    ".$clave."<br><br><br>";
	  $msg.= "HORA:     ".date("h:i:s a ")."<br>";
	  $msg.= "FECHA:    ".date("D, d M Y")."<br>";
		  $msg.= " Mensaje creado por www.grupoavila.com.ec <br>";
	  include("./phpmail/mailer.php");	
	  envio_email($dat['email'],"Reseteo Clave Cliente",$msg);
	  mysqli_query($enlace,"update usuarios set clave='".md5($clave)."' where id_usuario='".$rc->id_usuario."'");
	  echo '<div class="alert alert-success">Nueva Clave enviada a su E-mail</div>';
	}else{
		echo '<div class="alert alert-danger">E-mail no existe</div>';
	}//finn de if($rc->nombre!=''){
}
////////////////////////fin de recuperar clave///////////////////////

?>