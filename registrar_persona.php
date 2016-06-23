<?php 
	//Código para conectar
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "inventario";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	$conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 	

	if(isset($_POST["btnEnviar"])){
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$domicilio = $_POST["domicilio"];
		$telefono = $_POST["telefono"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO personas(nombre, apellido, domicilio, telefono)value('$nombre','$apellido','$domicilio','$telefono')";
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
	<title>Listado de personas</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Nueva Persona</strong>
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
			      <label class="control-label col-sm-1" for="email">Apellido:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellido" placeholder="Apellido">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Domicilio">Domicilio:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Domicilio" name="domicilio" placeholder="Domicilio">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Telefono">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>