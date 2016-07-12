<?php 
	//Código para conectar
	require_once('conectar_db.php');

	//Mostrar confirmacion de borrado
	if(isset($_GET["equipoID"])){
		$equipoID = $_GET["equipoID"];
		
		//Codigo para ejecutar query
		$sql = "SELECT * FROM equipo
				WHERE equipoID = $equipoID";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnBorrar"])){
		$equipoID = $_POST["equipoID"];
		//Codigo para ejecutar query
		$sql = "DELETE FROM equipo
				WHERE equipoID = $equipoID";

		echo $sql;
		$result = $conn->query($sql);
		$conn->close();

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
	<title>Eliminar registro de Equipo.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Eliminar equipo</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>

				<p>¿Esta seguro de eliminar el siguien registro?</p>
				<strong>ID: </strong><span><?php echo $row["equipoID"]?></span><br>
				<strong>Nombre: </strong><span><?php echo $row["nombre"]?></span>

				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="equipoID" id="equipoID" value="<?php echo $row["equipoID"]?>">
				    <button class="btn btn-primary" name="btnBorrar">Borrar</button>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>