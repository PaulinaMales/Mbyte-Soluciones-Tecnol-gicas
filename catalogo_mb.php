<?php  
include_once("./sistema/conect.php");
$id_cat=sprintf("%d",$_GET['c']);
//$c=mysqli_fetch_object(mysqli_query($enlace,"select * from tab_categorias where id_categoria=".$id_cat));
$sqlp=mysqli_query($enlace,"select * from productos where estado=0 and id_categoria=".$id_cat);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Mbyte Soluciones Tecnológicas</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
        <link rel="stylesheet" href="estilos/styles-components.css">
      </head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- INICIO DEL HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img class="logo-img" src="./images/logo_ 1.png" alt="logo" class="d-inline-block align-text-top">
              Mbyte Soluciones Tecnológicas
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">☰</span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Acerca de</a>
                </li>     
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Contacto</a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="catalogo_mb.php">Catálogo</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="sistema/index.php">Iniciar Sesión</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Registrarse</a>
                </li>    
            </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- FIN DEL HEADER -->




  <!-- INICIO DEL CATALOGO  -->

<div style="margin-top: 120px;">
  <div class="catalogo--head" >
    <span class="sky-dark-title" >Artículos</span>
  </div>

  <hr>

    <ul class="nav flex-row">
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=1" >Laptops</a>
      </li>
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=3">Pc-Gamers</a>
      </li>     
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=8">Monitores</a>
      </li>    
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=4">Procesadores</a>
      </li>  
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=6">Ram</a>
      </li> 
      <li class="nav-item">
          <a class="cat__item" href="catalogo_mb.php?c=9">Otros Productos</a>
      </li>    
    </ul>
  
  <div class="container wd-100">
    <!-- <div class="catalogo__tipo">
      <a class="color-black wg-title" href="">Laptops</a>
      <a class="color-black wg-title" href="">De&nbsp;escritorio</a>
      <a class="color-black wg-title" href="">Accesorios</a>
    </div> -->
    <div id="catalogo">
      <div class="parent__catalogo">
        <div class="catalogo__cards">


        <?php
			
			 while($rp=mysqli_fetch_object($sqlp)){ 
			 
			 ?>




          <article class="catalogo__card">
            <img src="./sistema/imagenes/foto/<?php echo $rp->imagen; ?>" class="catalogo__picture" alt="project-one">
            <div class="catalogo__texts">
              <h3 class="catalogo__title"><?php echo $rp->item; ?></h3>
              <p class="catalogo__paragraph"><?php echo $rp->descripcion; ?></p>
              <p class="catalogo__paragraph rg-0"><?php echo $rp->precio; ?></p>
            </div>
          </article>

          <?php
				} ?>
  
  <!--
          <article class="catalogo__card">
            <img src="./images/img-def.png" class="catalogo__picture" alt="project-one">
            <div class="catalogo__texts">
              <h3 class="catalogo__title">Articulo.</h3>
              <p class="catalogo__paragraph">Descripción corta.</p>
              <p class="catalogo__paragraph rg-0">$ 0.00</p>
            </div>
          </article>
  
          <article class="catalogo__card">
            <img src="./images/img-def.png" class="catalogo__picture" alt="project-one">
            <div class="catalogo__texts">
              <h3 class="catalogo__title">Articulo.</h3>
              <p class="catalogo__paragraph">Descripción corta.</p>
              <p class="catalogo__paragraph rg-0">$ 0.00</p>
            </div>
          </article>
  
          <article class="catalogo__card">
            <img src="./images/img-def.png" class="catalogo__picture" alt="project-one">
            <div class="catalogo__texts">
              <h3 class="catalogo__title">Articulo.</h3>
              <p class="catalogo__paragraph">Descripción corta.</p>
              <p class="catalogo__paragraph rg-0">$ 0.00</p>
            </div>
          </article>
          -->
  
        </div>      
      </div>
    </div>

  </div>
</div>


  <!-- FIN DEL CATALOGO  -->

  <footer>
    <div class="footer-social-media">
      <a class="footer-logo" href="#">
        <img class="logo-img" src="./images/logo_ 1.png" alt="logo" class="d-inline-block align-text-top">
        Mbyte Soluciones Tecnológicas
      </a>
      <div class="social-media">
        <a href=""><iconify-icon icon="dashicons:whatsapp"></iconify-icon></a>
        <a href=""><iconify-icon icon="akar-icons:facebook-fill"></iconify-icon></a>
        <a href=""><iconify-icon icon="ant-design:instagram-filled"></iconify-icon></a>
        <a href=""><iconify-icon icon="akar-icons:tiktok-fill"></iconify-icon></a>
      </div>
    </div>
    <div class="footer-contact">
      <h6 class="footer-title">Contacto</h6>
      <p>Dirección
        <br> &nbsp;&nbsp;&nbsp;&nbsp;Av. Ladrón Guevara 253
      </p>
      <p>Quito, 170517</p>
      <p>electrónicaepn@gmail.com</p>
    </div>
    <div class="footer-shop">
      <h6 class="footer-title center-text">Catálogo</h6>
      <div class="boton-shop">
        <a href="#catalogo">Ir al Catálogo ></a>
      </div>
    </div>
  </footer>

</body>
</html>