<?php  
if (!isset($_SESSION)) {
  session_start();
}
/*error_reporting(0);*/
include_once("../conect.php");
if($_SESSION['id_usu']){
$idop=$_SESSION['id_usu'];
$du=mysqli_fetch_object(mysqli_query($enlace,"select * from usuarios u,perfiles p where id_usuario=".$idop." and u.id_perfil=p.id_perfil"));
}else{
header("Location:../index.php");
}//fin de if($_SESSION['cod_e']){
	$mes=array("Ene.","Feb.","Mar.","Abr.","May.","Jun.","Jul.","Ago.","Sep.","Oct.","Nov.","Dic.");
if($_GET['op']){
$op=$_GET['op'];
$_SESSION['op']=$op;
}elseif($_SESSION['op']){
$op=$_SESSION['op'];
}else{
$op='ini';
}
//Borrar usuario
if($_GET['du']){
$vdg=sprintf("%d",$_GET['du']);
		mysqli_query($enlace,"update usuarios set estado=1 where id_usuario=".$vdg);
		$mensaje='<div class="alert alert-info">Cliente "'.$_GET['nu'].'" Borrado</div>';	
}
//fin de Borrar usuario
//Borrar producto
if($_GET['dp']){
$vdg=sprintf("%d",$_GET['dp']);
		mysqli_query($enlace,"update productos set estado=1 where id_producto=".$vdg);
		$mensaje='<div class="alert alert-info">Producto "'.$_GET['np'].'" Borrado</div>';	
}
//fin de Borrar usuario
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
    <link href="../css/login.css" rel="stylesheet" media="screen">
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script language="javascript">
	  function update_iframe(url,titulo){
		  $('#myModalLabel').html(titulo);
		  if(titulo=='Datos Cliente' || titulo=='Datos Producto' || titulo=='Detalle Pedido' || titulo=='Nuevo Pedido'){
			  $('#btnCerrar').css('display','block');
			  $('#btnCerrarNuevoActualizar').css('display','none');
		  }else{
			  $('#btnCerrar').css('display','none');
			  $('#btnCerrarNuevoActualizar').css('display','block');
		  }
		  document.all.iframeu.src = url; 
		  
	  }
function update_iframec(url,titulo){
		  $('#myModalLabel_clave').html(titulo);
		  document.all.iframec.src = url; 
}
function confirmau(a,b){
	if (confirm("Esta seguro de borrar el Cliente \n" + b))
	{
	 window.location.href="index_1.php?option=cli&du=" + a;
	}
}
function confirmap(a,b){
	if (confirm("Esta seguro de borrar el Producto \n" + b))
	{
	 window.location.href="index_1.php?option=inv&dp=" + a;
	}
}
	</script>

    
  </head>

  <body>
    <nav class="navbar navbar-default" role="navigation" style="max-width: 1170px; margin:auto">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index_1.php?op=ini"><img src="../imagenes/logo-grupo-avila.png" width="109" height="35" alt=""/></a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?php if($op=='ini'){?>class="active"<?php } ?>><a href="index_1.php?op=ini">INICIO</a></li>
      <li <?php if($op=='inv'){?>class="active"<?php } ?>><a href="index_1.php?op=inv">INVENTARIO</a></li>
      <li <?php if($op=='ped'){?>class="active"<?php } ?>><a href="index_1.php?op=ped">PEDIDOS</a></li>
      
    </ul>
 
    <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> <?php echo "<strong>".$du->nombre_perfil."</strong> ".$du->nombre." ".$du->apellido; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#" data-toggle="modal" data-target="#popupNuevaVentanaClave" onClick="update_iframec('aclave.php','Cambio Contraseña')" title="Cambio Contraseña"><span class="glyphicon glyphicon-refresh"></span> Cambiar Contraseña</a></li>
          <li><a href="../close.php"><span class="glyphicon glyphicon-remove"></span> Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>


<!-- contenido de las diferntes secciones del sistema -->
    <div id="contenido" class="shadow-gris" style="padding: 20px;">
    
<?php if($op=='ini'){ ?> 
    <h1>Bienvenido al sistema</h1>
    <img src="../imagenes/login-grupo-avila.png" width="1130" height="485" alt=""/>
    
<?php }elseif($op=='inv'){//Modulo Inventario de Productos 

        //paginacion 
			$numn=30;
			if($_GET['pag']){
			$fin=$_GET['pag']*$numn;
			$ini=$fin-$numn;
			$vpag=$_GET['pag'];
			}else{
			$fin=$numn;
			$ini=0;
			$vpag=1;
			}//fin de if($_GET['pag']){
				if($_GET['pal']){
			      $palabra=trim($_GET['pal']);
				}elseif($_POST['pal']){
					$palabra=trim($_POST['pal']);
				}
				
				if($palabra!=''){//busqueda
				  $adicional=" and item like '%".$palabra."%'";
				  $textadi=" Encontrados ";
				}
			$sqlv=mysqli_query($enlace,"select * from productos where estado=0 ".$adicional." order by id_producto DESC  LIMIT ".$ini." , ".$numn);
			$_SESSION['print']="select * from productos where estado=0 ".$adicional." order by id_producto DESC  LIMIT ".$ini." , ".$numn;
			$numv=mysqli_num_rows($sqlv);
			   $numf=mysqli_fetch_object(mysqli_query($enlace,"select count(*) as nf from productos where estado=0 ".$adicional));
											 $num_filas=$numf->nf;		

 ?>
    
    
    
    <table width="100%" border="0" cellpadding="2" cellspacing="2" >
        <tr>
          <td>
            <table width="100%" border="0" cellpadding="2" cellspacing="2">
              <tr>
                <td nowrap>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">
                <form id="fbuscar" name="fbuscar" method="post" action="index_1.php">
                <div class="input-group col-xs-5">
                  <input name="pal" type="text" id="pal" value="" size="20" class="form-control" placeholder="Inserte nombre de producto" />
                  <span class="input-group-addon btn btn-primary btn-sm"  id="btnBuscar" onClick="fbuscar.submit()"><span  class="glyphicon glyphicon-search"></span>Buscar </span>
                  </div>
                  </form></td>
              </tr>
            </table>
              <br>
            <table border="0" cellpadding="2" cellspacing="2">
              <tr>
                <td valign="middle"><h4>Productos registrados : </h4> </td>
                <td>&nbsp;</td>
                <td valign="middle"><h4><span class="text-info">
                  <?php  echo $num_filas." ".$textadi; ?>
                </span></h4></td>
                <td>&nbsp;</td>
                <td><?php echo $mensaje; ?></td>
              </tr>
            </table>
            <br>
            <?php if($numv>0){ ?>
            <div style="width:700px">
              <table class="table">
                <tr bgcolor="#CCCCCC">
                  <th>N&ordm;</th>
                  <th>Item</th>
                  <th>Precio</th>
                  <th>Fecha Ingreso</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
				  $i=$ini;
				  while($row=mysqli_fetch_object($sqlv)){
  $i=$i+1;
  ?>
                <tr style="background-color:#FFFFFF" onMouseOver="this.style.backgroundColor='#DCD9D9'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row->item; ?></td>
                  <td><?php echo sprintf("%01.2f",$row->precio); ?></td>
                  <td>
                    <?php 
		  $fecha_1=explode(" ",$row->fecha_creacion);
		  $fecha=explode("-",$fecha_1[0]);
		  echo $mes[$fecha[1]-1]." ".$fecha[2].", ".$fecha[0]; ?>
                  </td>
                  <td align="center"><a data-toggle="modal" data-target="#popupNuevaVentana" class="btn btn-info btn-xs" onClick="update_iframe('dproducto.php?p=<?php echo $row->id_producto; ?>','Datos Producto')" title="Datos">Datos</a></td>
                  <td><div align="center"><a data-toggle="modal" data-target="#popupNuevaVentana" class="btn btn btn-success btn-xs" onClick="update_iframe('ipedido.php?p=<?php echo $row->id_producto; ?>','Nuevo Pedido')" title="Solicitar">Solicitar</a></div></td>
                </tr>
                <?php }//fin de while?>
              </table>
            </div>
                  <ul class="pagination">
                    <?php 
											 if($vpag<=7){//control para desplegar solo $numn catalogos 
											 $j=0;//inicio
											 $k=7;//final
											 }else{
											 $j=$vpag-7;//inicio
											 $k=$vpag;//final
											 }
											 $sp=$vpag+1;//siguiente pagina
											 $ap=$vpag-1;//pagina anterior
											 //desplegar numeros si hay mas numeros de pagina
											 if($num_filas>$numn){
											 $i=$num_filas/$numn;
											 ?>
                    <?php
											
											 if($ap>0){//control para mostrar o ocultar pagina anterior
										  ?>
                    <li><a href="index_1.php?pag=1&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Primera p&aacute;gina">&lt;&lt; </a></li>
                    <li><a href="index_1.php?pag=<?php echo $ap; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Pagina anterior">&lt;</a></li>
                    <?php
										    }//fin de if($ap>1)
											 while($j<$i and $j<$k){
											 $j++;
											 if($vpag==$j){//ver en que catalogo estamos
											 ?>
                    <li class="active"><a href="#"><?php echo $j; ?></a></li>
                    <?php
										  }else{
										  ?>
                    <li><a href="index_1.php?pag=<?php echo $j; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>"><?php echo $j; ?></a></li>
                    <?php
										  }//fin de if($vpag=$j)
										   }//fin While
										   if($sp<$i+1){//control para mostrar o ocultar siguiente pagina
										  ?>
                    <li><a href="index_1.php?pag=<?php echo $sp; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" class="link1" title="Siguiente pagina">&gt;</a></li> 
                    <li><a href="index_1.php?pag=<?php echo ceil($i); ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Ultima p&aacute;gina">&gt;&gt;</a></li>
                    <?php
										    }//fin de if($sp<=$j)
											}
											?>
            </ul>
            
          <?php }//fin de if($numv<0)
			  
			  ?></td>
        </tr>
      </table>
      
   
<?php }elseif($op=='ped'){//Modulo Pedido de Productos 

        //paginacion 
			$numn=30;
			if($_GET['pag']){
			$fin=$_GET['pag']*$numn;
			$ini=$fin-$numn;
			$vpag=$_GET['pag'];
			}else{
			$fin=$numn;
			$ini=0;
			$vpag=1;
			}//fin de if($_GET['pag']){
				if($_GET['pal']){
			      $palabra=trim($_GET['pal']);
				}elseif($_POST['pal']){
					$palabra=trim($_POST['pal']);
				}
				
				if($palabra!=''){//busqueda
				  $adicional=" and id_pedido=".$palabra;
				  $textadi=" Encontrados ";
				}
			$sqlv=mysqli_query($enlace,"select * from pedidos where id_usuario=".$du->id_usuario.$adicional." order by id_pedido DESC  LIMIT ".$ini." , ".$numn);
			$_SESSION['print']="select * from pedidos where id_usuario=".$du->id_usuario.$adicional." order by id_pedido DESC  LIMIT ".$ini." , ".$numn;
			$numv=mysqli_num_rows($sqlv);
			   $numf=mysqli_fetch_object(mysqli_query($enlace,"select count(*) as nf from pedidos where id_usuario=".$du->id_usuario.$adicional));
											 $num_filas=$numf->nf;		

 ?>
 <?php 
 $carrito = new Carrito();
 $carro=$carrito->get_content();
 if($carro){//revisar si tiene pedido por finalizar ?>
 <script>
$(document).ready(function(){
    // Show the Modal on load
	update_iframe('ipedido.php','Nuevo Pedido');
    $("#popupNuevaVentana").modal("show");
});
</script>
<?php }//finn de if($carro){/ ?>
   <table width="100%" border="0" cellpadding="2" cellspacing="2" >
        <tr>
          <td>
            <table width="100%" border="0" cellpadding="2" cellspacing="2">
              <tr>
                
                
                <td nowrap>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">
                <form id="fbuscar" name="fbuscar" method="post" action="index_1.php">
                <div class="input-group col-xs-5">
                  <input name="pal" type="text" id="pal" value="" size="20" class="form-control" placeholder="Inserte numero de pedido" />
                  <span class="input-group-addon btn btn-primary btn-sm"  id="btnBuscar" onClick="fbuscar.submit()"><span  class="glyphicon glyphicon-search"></span>Buscar </span>
                  </div>
                  </form></td>
              </tr>
            </table>
              <br>
            <table border="0" cellpadding="2" cellspacing="2">
              <tr>
                <td valign="middle"><h4>Pedidos registrados : </h4> </td>
                <td>&nbsp;</td>
                <td valign="middle"><h4><span class="text-info">
                  <?php  echo $num_filas." ".$textadi; ?>
                </span></h4></td>
                <td>&nbsp;</td>
                <td><?php echo $mensaje; ?></td>
              </tr>
            </table>
            <br>
            <?php if($numv>0){ ?>
            <div style="width:500px">
              <table class="table">
                <tr bgcolor="#CCCCCC">
                  <th>#</th>
                  <th>No. Pedido</th>
                  <th width="50">Valor</th>
                  <th>Fecha Ingreso</th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
				  $i=$ini;
				  while($row=mysqli_fetch_object($sqlv)){
  $i=$i+1;
  ?>
                <tr style="background-color:#FFFFFF" onMouseOver="this.style.backgroundColor='#EBFCE2'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
                  <td><?php echo $i; ?></td>
                  <td><?php echo sprintf("%'.05d\n",$row->id_pedido); ?></td>
                  <td align="right"><?php echo sprintf("%01.2f",$row->precio_total); ?></td>
                  <td>
                    <?php 
		  $fecha_1=explode(" ",$row->fecha_creacion);
		  $fecha=explode("-",$fecha_1[0]);
		  echo $mes[$fecha[1]-1]." ".$fecha[2].", ".$fecha[0]; ?>
                  </td>
                  <td align="center"><a data-toggle="modal" data-target="#popupNuevaVentana" class="btn btn-info btn-xs" onClick="update_iframe('dpedido.php?ip=<?php echo $row->id_pedido; ?>','Detalle Pedido')" title="Detalle Pedido">Detalles</a></td>
                </tr>
                <?php }//fin de while?>
              </table>
              </div>
                  <ul class="pagination">
                    <?php 
											 if($vpag<=7){//control para desplegar solo $numn catalogos 
											 $j=0;//inicio
											 $k=7;//final
											 }else{
											 $j=$vpag-7;//inicio
											 $k=$vpag;//final
											 }
											 $sp=$vpag+1;//siguiente pagina
											 $ap=$vpag-1;//pagina anterior
											 //desplegar numeros si hay mas numeros de pagina
											 if($num_filas>$numn){
											 $i=$num_filas/$numn;
											 ?>
                    <?php
											
											 if($ap>0){//control para mostrar o ocultar pagina anterior
										  ?>
                    <li><a href="index_1.php?pag=1&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Primera p&aacute;gina">&lt;&lt; </a></li>
                    <li><a href="index_1.php?pag=<?php echo $ap; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Pagina anterior">&lt;</a></li>
                    <?php
										    }//fin de if($ap>1)
											 while($j<$i and $j<$k){
											 $j++;
											 if($vpag==$j){//ver en que catalogo estamos
											 ?>
                    <li class="active"><a href="#"><?php echo $j; ?></a></li>
                    <?php
										  }else{
										  ?>
                    <li><a href="index_1.php?pag=<?php echo $j; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>"><?php echo $j; ?></a></li>
                    <?php
										  }//fin de if($vpag=$j)
										   }//fin While
										   if($sp<$i+1){//control para mostrar o ocultar siguiente pagina
										  ?>
                    <li><a href="index_1.php?pag=<?php echo $sp; ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" class="link1" title="Siguiente pagina">&gt;</a></li> 
                    <li><a href="index_1.php?pag=<?php echo ceil($i); ?>&pal=<?php echo $palabra ?>&filtro=<?php echo $fil ?>" title="Ultima p&aacute;gina">&gt;&gt;</a></li>
                    <?php
										    }//fin de if($sp<=$j)
											}
											?>
            </ul>
            
          <?php }//fin de if($numv<0)
			  
			  ?></td>
        </tr>
      </table>
    <?php }//fin de if($op=='ini'){?>   
    
    
    
    
    
    
    </div> <!-- /container -->

    <div id="binary" style="text-align:center"><a href="http://binary.ec" target="_blank"><img style="padding-bottom: 20px; padding-top: 20px" src="../../images/LOGO-BINARY.png"  alt="Desarrollado por: BINARY SISTEMAS" title="Desarrollado por: BINARY SISTEMAS"/></a></div>
    
    
    
    <!-- Ventana Modal para mostrar contenido en popup bootstrap -->
    <div class="modal fade" id="popupNuevaVentana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-header">
        <button id="btnCerrarNuevoActualizar" type="button" class="close" data-dismiss="modal" onClick="window.location.reload()"><span aria-hidden="true">&times; Cerrar</span><span class="sr-only">Cerrar</span></button>
        <button id="btnCerrar" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; Cerrar</span><span class="sr-only">Cerrar</span></button>
        
        <h4 class="modal-title" id="myModalLabel">Titulo Dinamico</h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
            <iframe src="" name="iframeu" width="560px" height="370px" frameborder="0"></iframe>
      </div>
   
    </div>
  </div>
</div>
<!-- Hasta aqui Ventana Modal para mostrar contenido en popup bootstrap -->

<!-- Ventana Modal para mostrar cambio de clave -->
    <div class="modal fade" id="popupNuevaVentanaClave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     
      <div class="modal-header">
        <button id="btnCerrarClave" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; Cerrar</span><span class="sr-only">Cerrar</span></button>
        
        <h4 class="modal-title" id="myModalLabel_clave">Titulo Dinamico</h4>
      </div>
      <div id="nuevaAventura_clave" class="modal-body">
            <iframe src="" name="iframec" width="250px" height="200px" frameborder="0"></iframe>
      </div>
   
    </div>
  </div>
</div>
    <!-- Hasta aqui Ventana Modal para mostrar cambio de clave -->

  </body>
</html>