<?php 
	mysql_connect('localhost','root','root') or die;
	mysql_select_db('taller-web-tienda') or die;

	$consulta = "SELECT * FROM `compras` WHERE 1 ORDER BY id DESC";

	$resultado = mysql_query($consulta);

	$numResultados = mysql_num_rows($resultado);


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tienda de paquetes | Perfil</title>
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
						<li class="active">
							<a href="perfil.php">Perfil</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
		<div class="col-md-12">
			<h1>Historial de compras</h1>
			<br>
			<?php  
				for ($i=0; $i < $numResultados; $i++) { 
					$filas = mysql_fetch_array($resultado);
					$productos = (explode(",",($filas[productos])));
					$arrlength=count($productos);
			?>
			<div class="panel panel-default">
			  <div class="panel-heading"> <b>Fecha de la compra:</b> <?php echo ($filas[fecha]); ?></div>
			  <table class="table table-striped">
		        <thead>
		          <tr>
		          	<th>#</th>
		            <th>Nombre del Producto</th>
		          </tr>
		        </thead>
		        <tbody>
		            <?php 
			            for($x=0;$x<$arrlength-1;$x++){
			              $indiceProducto = $x+1;
			              echo '<tr>';
			              echo '<td>'.$indiceProducto.'</td>';
						  echo '<td>'.$productos[$x].'</td>';
						  echo '</tr>';
						}
		             ?>
		        </tbody>
		      </table>		
			</div>
			<?php } ?>
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
