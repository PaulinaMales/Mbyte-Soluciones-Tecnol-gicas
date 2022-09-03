<?php 
include_once("./conect.php");
	
//$_POST['email']!
//print_r($_POST);

mysqli_query($enlace,"insert into clientes(nombre,email,usuario,contrasenia) values('".$_POST['name']."','".$_POST['email']."','".$_POST['user']."','".$_POST['password']."')");

header("Location:../informacion.html");	




?>