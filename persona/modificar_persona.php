<?php 
	//Código para conectar
	require_once('conectar_db.php');	

	//Mostrar confirmacion de borrado
	if(isset($_GET["personaID"])){
		$personaID = $_GET["personaID"];
		
		//Codigo para ejecutar query
		$sql = "SELECT * FROM personas
				WHERE personaID = $personaID";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnActualizar"])){
		$personaID = $_POST["personaID"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$domicilio = $_POST["domicilio"];
		$telefono = $_POST["telefono"];

		//Codigo para ejecutar query
		$sql = "UPDATE personas
				SET nombre='$nombre', apellido='$apellido', domicilio='$domicilio', telefono='$telefono'
				WHERE personaID = $personaID";

		echo $sql;
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
	<title>Modificar registro de persona.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<!-- Se esta insertando el menú-->
	<?php require('render_menu.php');?>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Modificar Persona</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>
				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="personaID" id="personaID" value="<?php echo $row["personaID"]?>">

					<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellido" placeholder="Apellido" value="<?php echo $row["apellido"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Domicilio">Domicilio:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Domicilio" name="domicilio" placeholder="Domicilio" value="<?php echo $row["domicilio"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Telefono" value="<?php echo $row["telefono"] ?>">
			      </div>
			    </div>

				    <button class="btn btn-primary" name="btnActualizar">Actualizar</button>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>