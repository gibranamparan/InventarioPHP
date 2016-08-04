<?php 
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'\conectar_db.php');

	//Si se presiono el boton guardar
	if(isset($_POST["btnGuardar"])){
		$personaID = $_POST["personaID"];
		$fechaPrestamo = $_POST["fechaPrestamo"];
		$fechaEntrega = $_POST["fechaEntrega"];
		$fechaEntregado = $_POST["fechaEntregado"];
		$equipoID = $_POST["personaID"];


		//Codigo para ejecutar query
		$sql = "INSERT INTO prestamo(personaID, fechaPrestamo, fechaEntrega,fechaEntregado,equipoID)value('$personaID','$fechaPrestamo','$fechaEntrega',$fechaEntregado,$equipoID)";
		$result = $conn->query($sql);
	}

	$personaID = $_GET["personaID"];
	//Codigo para ejecutar query
	$sql = "SELECT * FROM personas
			WHERE personaID = $personaID";
	$result = $conn->query($sql);


	//Codigo para ejecutar query
	$sql = "SELECT * FROM equipo";
	$resultEquipo = $conn->query($sql);

	$row = $result->fetch_assoc();
	$nombre = $row["nombre"];

	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Nuevo Prestamo</strong>
		</div>
		<div class="panel-body">
		<div class="container">
		<div><strong>Persona: </strong><?php echo $nombre ?></div>
		<form class="form-horizontal" role="form" method="POST">
		<div>
			<input type="hidden" class="form-control" value="<?php echo $personaID ?>" name="personaID">
			</div>
			<div class="form-group">
				<label for="equipoID">ID de equipo</label>
				<select name="equipoID" class="form-control" >
				<?php
				  while($row = $resultEquipo->fetch_assoc()) {?>
				    <tr>		
				    	<option value="<?php echo $row["equipoID"]?>">
				    		<?php echo $row["nombre"]?>
				    	</option>
				    </tr>
    			<?php } ?>//End while
				</select>
			</div>
			<div class="form-group">
				<label for="fechaPrestamo">Fecha del prestamo</label>
				<input type="date" class="form-control" name="fechaPrestamo" placeholder="fechaPrestamo">
			</div>
			<div class="form-group">
				<label for="fechaEntrega">fecha de entrega:</label>
				<input type="date" class="form-control" name="fechaEntrega" placeholder="fechaEntrega">
			</div>
			<div class="form-group">
				<label for="fechaEntregado">fecha de entregado:</label>
				<input type="date" class="form-control" name="fechaEntregado" placeholder="fechaEntregado">
			</div>

			<button name="btnGuardar">Guardar</button>
		</form>
		</div>
		</div>
		</div>
	<!-- `, `equipoID`, `personaID`, `fechaPrestamo`, `fechaEntrega`, `fechaEntregado-->
</body>
</html>