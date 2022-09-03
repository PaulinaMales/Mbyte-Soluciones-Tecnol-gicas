<?php
include_once("../conect.php");
$vop=$_POST['op'];
$vid=$_POST['id'];
$mes=array("Ene.","Feb.","Mar.","Abr.","May.","Jun.","Jul.","Ago.","Sep.","Oct.","Nov.","Dic.");
if($vop==1){//lista de ciudades segun provincia
   ?>
     <select name="ciudad" id="ciudad" style="width:200px">
     <option value="">-------</option>
   <?php 
  $cc=mysqli_query($enlace,"select * from tab_ciudades where id_provincia=".$vid." order by ciudad");
  while($rc=mysqli_fetch_object($cc)){
 ?>   
 <option value="<?php echo $rc->id_ciudad; ?>"><?php echo utf8_encode($rc->ciudad); ?></option>
   <?php } ?> 
</select>
<?php } ?>
<?php
if($vop==2){//validar No. identificacion repetida
  $rc=mysqli_fetch_object(mysqli_query($enlace,"select cedula from usuarios where cedula='".trim($vid)."'"));
  if($rc->cedula!=''){
	  echo '<span class="text-danger">Identificacion ya existe</span>
	  <script language="javascript">
$("#cedula").val("");
</script>
	  ';
  }
} ?>
