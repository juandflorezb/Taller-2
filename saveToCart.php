<?php 
	$keys = array_keys($_POST);
	$arrlength=count($keys);
	$fecha = date("Y-m-d");
	$resultado = '';

	for($i=0;$i<$arrlength;$i++) {
	  $productos = $productos.$_POST[$keys[$i]].",";
	}
	//echo $productos;
	mysql_connect('localhost','root','root') or die;
	mysql_select_db('taller-web-tienda') or die;

	$agregarCompra = "INSERT INTO `compras`(`id`,`fecha`,`productos`) VALUES ('','$fecha','$productos')";
	mysql_query($agregarCompra) or die;
	$resultado = 'Gracias por su compra!';
 ?>

 <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Mi tiendita | Perfil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body class="home">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
			<img alt="140x140" src="img/Logo.jpg">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.html">Compre los mejores paquetes al mejor precio</a>
				</div>
				
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="catalogo.html">Catalogo</a>
						</li>
						<li >
							<a href="perfil.php">Perfil</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
		<div class="col-md-12 resultado" >
			<h3 class="text-center"><?php echo $resultado; ?></h3>
		</div>
	</div>
	<footer class="row clearfix">
		<div class="col-md-12">
			<br>
			<p class="text-center">
				Desarrollado por Juan David Flórez.
			</p>
		</div>
	</footer>
</div>
</body>
</html>



