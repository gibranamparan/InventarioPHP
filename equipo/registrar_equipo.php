<?php 
	//Código para conectar
	require_once('conectar_db.php');	

	if(isset($_POST["btnEnviar"])){
		$nombre = $_POST["nombre"];
		$costo = $_POST["costo"];
		$cantidadMaxima = $_POST["cantidadMaxima"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO equipo(nombre, costo, cantidadMaxima)value('$nombre','$costo','$cantidadMaxima')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /inventario/index.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Equipos</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<!-- Se esta insertando el menú-->
	<?php require('render_menu.php');?>
	
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Nuevo Equipo</strong>
		</div>
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Costo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="costo" name="costo" placeholder="Costo">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="CantidadMaxima">Cantidad Maxima:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="camtidadMaxima" name="camtidadMaxima" placeholder="Cantidad Maxima">
			      </div>
			    </div>
				
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>