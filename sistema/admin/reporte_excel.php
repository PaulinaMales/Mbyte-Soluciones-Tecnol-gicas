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
require_once '../phpexcel/PHPExcel.php';
$fecha_reporte=date('Y-m-d')."_".date("Hms");

// Generamos el Excel  
$sql=$_SESSION['print'];
$sqli=mysqli_query($enlace,$sql);
$numpe=mysqli_num_rows($sqli);
$mes=array("Ene.","Feb.","Mar.","Abr.","May.","Jun.","Jul.","Ago.","Sep.","Oct.","Nov.","Dic.");
$noper= array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ"," ");
$noper1= array("a","e","i","o","u","A","E","I","O","U","n","N","_");
	$styleThickBrownBorderOutline = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
  );
	$styleThickBrownBorderOutline1 = array(
	'borders' => array(
		'top' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
  );
	$styleThickBrownBorderOutline2 = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
  );
$archivo="Reporte_Pedidos_".$fecha_reporte.".xls";
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("GrupoAvila")
							 ->setLastModifiedBy($du->nombre." ".$du->apellido)
							 ->setTitle("GrupoAvila")
							 ->setSubject("GrupoAvila")
							 ->setDescription("GrupoAvila")
							 ->setKeywords("GrupoAvila")
							 ->setCategory("GrupoAvila");
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getDefaultStyle()->getFont()->setName('Verdana');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(11); 
$objPHPExcel->getActiveSheet()->setCellValue('A1','Pedidos Registrados '.$numpe);
$objPHPExcel->getActiveSheet()->setCellValue('A2', " #.");
$objPHPExcel->getActiveSheet()->setCellValue('B2', " No. Pedido ");
$objPHPExcel->getActiveSheet()->setCellValue('C2', " Cliente ");
$objPHPExcel->getActiveSheet()->setCellValue('D2', " Valor ");
$objPHPExcel->getActiveSheet()->setCellValue('E2', " Fecha Ingreso ");
$objPHPExcel->getActiveSheet()->freezePane('A3');//fila fija
   $i=1;
   $c=3;
   
while($row=mysqli_fetch_object($sqli)){
		  $objPHPExcel->getActiveSheet()->getStyle('A'.$c.':E'.$c)->applyFromArray($styleThickBrownBorderOutline);	
		  $objPHPExcel->getActiveSheet()->setCellValue('A'.$c, $i);
		  $objPHPExcel->getActiveSheet()->getCell('B'.$c)->setValueExplicit(sprintf("%'.05d\n",$row->id_pedido), PHPExcel_Cell_DataType::TYPE_STRING);
		  $rc=mysqli_fetch_object(mysqli_query($enlace,"select nombre,apellido from usuarios where id_usuario=".$row->id_usuario));
          $objPHPExcel->getActiveSheet()->setCellValue('C'.$c, $rc->nombre." ".$rc->apellido);
          $objPHPExcel->getActiveSheet()->setCellValue('D'.$c, sprintf("%01.2f",$row->precio_total));
		  $fecha_1=explode(" ",$row->fecha_creacion);
		  $fecha=explode("-",$fecha_1[0]);
		  $objPHPExcel->getActiveSheet()->setCellValue('E'.$c, $mes[$fecha[1]-1]." ".$fecha[2].", ".$fecha[0]);
		  $i=$i+1;
		  $c=$c+1;
	}//fin while($row
//estilos en el archivo
$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');//unir celdas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);//ancho
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('A2:E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A3:A'.$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getStyle('A2:E2')->applyFromArray($styleThickBrownBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('A3:E'.$c)->applyFromArray($styleThickBrownBorderOutline2);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
?>