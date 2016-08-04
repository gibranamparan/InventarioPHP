<?php 
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'\conectar_db.php');	

	//Mostrar confirmacion de borrado
	if(isset($_GET["equipoID"])){
		$equipoID = $_GET["equipoID"];
		
		//Codigo para ejecutar query
		$sql = "SELECT * FROM equipo
				WHERE equipoID = $equipoID";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnActualizar"])){
		$equipoID = $_POST["equipoID"];
		$nombre = $_POST["nombre"];
		$costo = $_POST["costo"];
		$cantidadMaxima = $_POST["cantidadMaxima"];

		//Codigo para ejecutar query
		$sql = "UPDATE equipo
				SET nombre='$nombre', costo='$costo', cantidadMaxima='$cantidadMaxima'
				WHERE equipoID = $equipoID";

		echo $sql;
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /inventario/index_equipo.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar registro de equipo.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Modificar equipo</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>
				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="equipoID" id="equipoID" value="<?php echo $row["equipoID"]?>">

					<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Costo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="costo" name="costo" placeholder="costo" value="<?php echo $row["costo"] ?>">
			      </div>
			    </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="cantidadMaxima">Cantidad Máxima:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="cantidadMaxima" name="cantidadMaxima" placeholder="cantidadMaxima" value="<?php echo $row["cantidadMaxima"] ?>">
			      </div>
			    </div>

				    <button id="btnActu" class="btn btn-primary" name="btnActualizar">Actualizar</button>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>