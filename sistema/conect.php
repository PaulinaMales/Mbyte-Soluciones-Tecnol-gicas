<?php 
error_reporting(0);
/* Conexi�n a la BD  */
$host= "localhost";

$usuario= "root";
$contrasena= "0998927563MMPe";
$base_datos="mbyte";

$enlace= mysqli_connect($host,$usuario,$contrasena) or die ("NO SE CONECTA"); 
mysqli_select_db ($enlace,$base_datos) or die ("NO SE PUEDE SELECCIONAR".$base_datos);

/////////////funcion de redimension de imagen/////////////////////
function redimension($x,$y,$name,$type,$tmp_name,$t){

  $ruta="../imagenes".$t.$name;
  // Creando el thumbnail
   if(stristr($type,"jpeg") or stristr($type,"pjpeg") or stristr($type,"jpg")){
   $img = imagecreatefromjpeg($tmp_name);
  }elseif(stristr($type,"gif")){
  $img = imagecreatefromgif($tmp_name);
  }elseif(stristr($type,"png")){
  $img = imagecreatefrompng($tmp_name);
  }
  
  $thumb = imagecreatetruecolor($x, $y);
  $datos = getimagesize($tmp_name);
  imagecopyresized($thumb, $img, 0, 0, 0, 0, $x, $y, $datos[0], $datos[1]);
   if(stristr($type,"jpeg") or stristr($type,"pjpeg") or stristr($type,"jpg")){
    imagejpeg($thumb,$ruta);
  }elseif(stristr($type,"gif")){
   imagegif($thumb, $ruta);
  }elseif(stristr($type,"png")){
   imagepng($thumb, $ruta);
  }
 
}
//////////////////fin de funcion de redimension deimagen////////////////////

function subir_imgp($iname){//funcion subir imagen sin validacion
$ext=explode('/',$iname['type']);
$name=time().'.'.$ext[1];
move_uploaded_file ($iname['tmp_name'], "../imagenes/foto/".$name);
return $name;
}

function subir_imgp1($iname){//funcion subir imagen producto
		if($iname['name']!=''){
		  //codigo para subir el grafico al servidor
		  //-------------------------------------------------------------------------------------
		  //asignar un nombre unico a la imagen
		  /*mysqli_query($enlace,"insert into codimagen values('')");
		  $sql=mysqli_fetch_object(mysqli_query($enlace,"SELECT LAST_INSERT_ID( ) AS nombre FROM codimagen"));*/
		  $ext=explode('/',$iname['type']);
		  //$nombre_archivo = $sql->nombre.'.'.$ext[1]; //nombre imagen para operaciones de redimension}
		  $nombre_archivo = time().'.'.$ext[1]; //nombre imagen para operaciones de redimension
		  $imagen=$nombre_archivo ;//nombre imagen para guardar en la BD
		  ///////////////////////////////////////
		  //datos de la imagen
		  $tipo_archivo =$iname['type']; 
		  $tamano_archivo = $iname['size']; 
		  $archivo_temporal = $iname['tmp_name'];
		  list($ancho, $alto, $tipo, $atributos) = getimagesize($iname['tmp_name']);
		  //compruebo si las caracter�sticas del archivo son las que deseo 
		  //formato gif o jpg no existan imagenes duplicadas y tama�o maximo de 1MB
		if (!((stristr($tipo_archivo, "gif") || stristr($tipo_archivo, "jpeg") || stristr($tipo_archivo, "jpg") || stristr($tipo_archivo, "pjpeg")) && ($tamano_archivo < 1000000))) {
			 
			 $error1='No se pudo copiar la imagen, la extencion de la imagen debe ser .jpg o .gif y tener 1MB de tama�o maximo';
			 $_SESSION['e']=$error1.".<br> ";
			 $imagen=$error1;
			  
		}else{

		  //crear grafico peque�o
		  /*$t='/p/';
		  $x1=171;
		  $y1=243;
		  redimension($x1,$y1,$nombre_archivo,$tipo_archivo, $archivo_temporal,$t);*/
		   //crear grafico normal o grande
			$t='/foto/';
			if($ancho>500){
				$x1=500;
				$coeficiente=round($ancho/500,2);
				$y1=round($alto/$coeficiente,2);
		    }elseif($alto>500){
				$y1=500;
			    $coeficiente=round($alto/500,2);
			    $x1=round($ancho/$coeficiente,2);
		    }
			 redimension($x1,$y1,$nombre_archivo,$tipo_archivo, $archivo_temporal,$t); 
		}//fin de compruebo si las caracter�sticas del archivo son las que deseo
	}//fin de if($imagen!='')
return $imagen;	
}// fin de funcion subir imagen paquetes

function subir_imgv($iname,$a,$l){//funcion subir imagen variable
		if($iname['name']!=''){
		  //codigo para subir el grafico al servidor
		  //-------------------------------------------------------------------------------------
		  //asignar un nombre unico a la imagen
		  mysqli_query("insert into codimagen values('')");
		  $sql=mysqli_fetch_object(mysqli_query($enlace,"SELECT LAST_INSERT_ID( ) AS nombre FROM codimagen"));
		  $ext=explode('/',$iname['type']);
		  $nombre_archivo = $sql->nombre.'.'.$ext[1]; //nombre imagen para operaciones de redimension
		  $imagen=$nombre_archivo ;//nombre imagen para guardar en la BD
		  ///////////////////////////////////////
		  //datos de la imagen
		  $tipo_archivo =$iname['type']; 
		  $tamano_archivo = $iname['size']; 
		  $archivo_temporal = $iname['tmp_name'];
		  //compruebo si las caracter�sticas del archivo son las que deseo 
		  //formato gif o jpg no existan imagenes duplicadas y tama�o maximo de 1MB
		if (!((stristr($tipo_archivo, "gif") || stristr($tipo_archivo, "jpeg") || stristr($tipo_archivo, "jpg") || stristr($tipo_archivo, "pjpeg")) && ($tamano_archivo < 1000000))) {
			 
			 $error1='No se pudo copiar la imagen, la extencion de la imagen debe ser .jpg o .gif y tener 1MB de tama�o maximo';
			 $_SESSION['e']=$error1.".<br> ";
			  
		}else{
		  //crear grafico
		  $t='/p/';
		  $x1=$a;
		  $y1=$l;
		  redimension($x1,$y1,$nombre_archivo,$tipo_archivo, $archivo_temporal,$t);
		}//fin de compruebo si las caracter�sticas del archivo son las que deseo
	}//fin de if($imagen!='')
return $imagen;	
}// fin de funcion subir imagen paquetes

//funcion obtener stock producto
function stock($itemx) 
{
$consult="select u_disponibles from productos where codp='$itemx'";
$res=mysqli_query($enlace,$consult);
$row= mysqli_fetch_object ($res);
$unidades=$row->u_disponibles;
return $unidades;
}
//funcion obtener stock producto inicial
function stocki($itemx) 
{
$consult="select uinicial from detalleproductos where coddp='$itemx'";
$res=mysqli_query($enlace,$consult);
$row= mysqli_fetch_object ($res);
$unidades=$row->uinicial;
return $unidades;
}
//funcion actualizar disminuir stock
function astock($itemx,$n) 
{
	//actualizamos stock en productos
	//$stocki=mysqli_fetch_object(mysqli_query($enlace,"select u_inicial from productos where codp='$itemx'"));
	//if($stockn<=$stocki->u_inicial){
	$act_stock="update productos set unidades=(unidades-".$n.") where id_producto=".$itemx;
	mysqli_query($enlace,$act_stock);
	//}
}

//funcion actualizar stock inicial
function astocki($itemx,$stockn) 
{
	//actualizamos stock en productos
	$act_stock="update detalleproductos set uinicial='$stockn',unidades='$stockn' where coddp='$itemx'";
	mysqli_query($enlace,$act_stock);
 
}


///Clase Carrito de compras
class Carrito
{

	//aqu� guardamos el contenido del carrito
	private $carrito = array();
	//seteamos el carrito exista o no exista en el constructor
	public function __construct()
	{
		
		if(!isset($_SESSION["carrito"]))
		{
			$_SESSION["carrito"] = null;
			$this->carrito["precio_total"] = 0;
			$this->carrito["articulos_total"] = 0;
		}
		$this->carrito = $_SESSION['carrito'];
	}

	//a�adimos un producto al carrito
	public function add($articulo = array())
	{
		//primero comprobamos el articulo a a�adir, si est� vac�o o no es un 
		//array lanzamos una excepci�n y cortamos la ejecuci�n
		if(!is_array($articulo) || empty($articulo))
		{
			throw new Exception("Error, el articulo no es un array!", 1);	
		}

		//nuestro carro necesita siempre un id producto, cantidad y precio articulo
		if(!$articulo["id"] || !$articulo["cantidad"] || !$articulo["precio"])
		{
			throw new Exception("Error, el articulo debe tener un id, cantidad y precio!", 1);	
		}

		//nuestro carro necesita siempre un id producto, cantidad y precio articulo
		if(!is_numeric($articulo["id"]) || !is_numeric($articulo["cantidad"]) || !is_numeric($articulo["precio"]))
		{
			throw new Exception("Error, el id, cantidad y precio deben ser n�meros!", 1);	
		}

		//debemos crear un identificador �nico para cada producto
		$unique_id = md5($articulo["id"]);

		//creamos la id �nica para el producto
		$articulo["unique_id"] = $unique_id;
		
		//si no est� vac�o el carrito lo recorremos 
		if(!empty($this->carrito))
		{
			foreach ($this->carrito as $row) 
			{
				//comprobamos si este producto ya estaba en el 
				//carrito para actualizar el producto o insertar
				//un nuevo producto	
				if($row["unique_id"] === $unique_id)
				{
					//si ya estaba sumamos la cantidad
					$articulo["cantidad"] = $row["cantidad"] + $articulo["cantidad"];
				}
			}
		}

		//evitamos que nos pongan n�meros negativos y que s�lo sean n�meros para cantidad y precio
		$articulo["cantidad"] = trim(preg_replace('/([^0-9\.])/i', '', $articulo["cantidad"]));
	    $articulo["precio"] = trim(preg_replace('/([^0-9\.])/i', '', $articulo["precio"]));

	    //a�adimos un elemento total al array carrito para 
	    //saber el precio total de la suma de este art�culo
	    $articulo["total"] = $articulo["cantidad"] * $articulo["precio"];

	    //primero debemos eliminar el producto si es que estaba en el carrito
	    $this->unset_producto($unique_id);

	    ///ahora a�adimos el producto al carrito
	    $_SESSION["carrito"][$unique_id] = $articulo;

	    //actualizamos el carrito
	    $this->update_carrito();

	    //actualizamos el precio total y el n�mero de art�culos del carrito
	    //una vez hemos a�adido el producto
	    $this->update_precio_cantidad();

	}

	//m�todo que actualiza el precio total y la cantidad
	//de productos total del carrito
	private function update_precio_cantidad()
	{
		//seteamos las variables precio y art�culos a 0
		$precio = 0;
		$articulos = 0;

		//recorrecmos el contenido del carrito para actualizar
		//el precio total y el n�mero de art�culos
		foreach ($this->carrito as $row) 
		{
			$precio += ($row['precio'] * $row['cantidad']);
			$articulos += $row['cantidad'];
		}

		//asignamos a articulos_total el n�mero de art�culos actual
		//y al precio el precio actual
		$_SESSION['carrito']["articulos_total"] = $articulos;
		$_SESSION['carrito']["precio_total"] = $precio;

		//refrescamos �l contenido del carrito para que qued� actualizado
		$this->update_carrito();
	}

	//m�todo que retorna el precio total del carrito
	public function precio_total()
	{
		//si no est� definido el elemento precio_total o no existe el carrito
		//el precio total ser� 0
		if(!isset($this->carrito["precio_total"]) || $this->carrito === null)
		{
			return 0;
		}
		//si no es n�merico lanzamos una excepci�n porque no es correcto
		if(!is_numeric($this->carrito["precio_total"]))
		{
			throw new Exception("El precio total del carrito debe ser un n�mero", 1);	
		}
		//en otro caso devolvemos el precio total del carrito
		return $this->carrito["precio_total"] ? $this->carrito["precio_total"] : 0;
	}

	//m�todo que retorna el n�mero de art�culos del carrito
	public function articulos_total()
	{
		//si no est� definido el elemento articulos_total o no existe el carrito
		//el n�mero de art�culos ser� de 0
		if(!isset($this->carrito["articulos_total"]) || $this->carrito === null)
		{
			return 0;
		}
		//si no es n�merico lanzamos una excepci�n porque no es correcto
		if(!is_numeric($this->carrito["articulos_total"]))
		{
			throw new Exception("El n�mero de art�culos del carrito debe ser un n�mero", 1);	
		}
		//en otro caso devolvemos el n�mero de art�culos del carrito
		return $this->carrito["articulos_total"] ? $this->carrito["articulos_total"] : 0;
	}

	//este m�todo retorna el contenido del carrito
	public function get_content()
	{
		//asignamos el carrito a una variable
		$carrito = $this->carrito;
		//debemos eliminar del carrito el n�mero de art�culos
		//y el precio total para poder mostrar bien los art�culos
		//ya que estos datos los devuelven los m�todos 
		//articulos_total y precio_total
		unset($carrito["articulos_total"]);
		unset($carrito["precio_total"]);
		return $carrito == null ? null : $carrito;
	}

	//m�todo que llamamos al insertar un nuevo producto al 
	//carrito para eliminarlo si existia, as� podemos insertarlo
	//de nuevo pero actualizado
	private function unset_producto($unique_id)
	{
		unset($_SESSION["carrito"][$unique_id]);
	}

	//para eliminar un producto debemos pasar la clave �nica
	//que contiene cada uno de ellos
	public function remove_producto($unique_id)
	{
		//si no existe el carrito
		if($this->carrito === null)
		{
			throw new Exception("El carrito no existe!", 1);
		}

		//si no existe la id �nica del producto en el carrito
		if(!isset($this->carrito[$unique_id]))
		{
			throw new Exception("La unique_id $unique_id no existe!", 1);
		}

		//en otro caso, eliminamos el producto, actualizamos el carrito y 
		//el precio y cantidad totales del carrito
		unset($_SESSION["carrito"][$unique_id]);
		$this->update_carrito();
		$this->update_precio_cantidad();
		return true;
	}

	//eliminamos el contenido del carrito por completo
	public function destroy()
	{
		unset($_SESSION["carrito"]);
		$this->carrito = null;
		return true;
	}

	//actualizamos el contenido del carrito
	public function update_carrito()
	{
		self::__construct();
	}

}
//fin de class Carrito
?>