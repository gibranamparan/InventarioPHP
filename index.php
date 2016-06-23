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
	//Codigo para ejecutar query
	$sql = "SELECT * FROM personas";
	$result = $conn->query($sql);
	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de personas</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<a href="registrar_persona.php">Nueva Persona</a>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Personas</strong>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Domicilio</th>
					<th>Telefono</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["personaID"]?></td>
			    	<td><?php echo $row["nombre"]?></td>
			    	<td><?php echo $row["apellido"]?></td>
			    	<td><?php echo $row["domicilio"]?></td>
			    	<td><?php echo $row["telefono"]?></td>
			    	<td>
			    		<a href="borrar_persona.php?personaID=<?php echo $row['personaID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="modificar_persona.php?personaID=<?php echo $row['personaID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
			    	</td>
			    </tr>
		    <?php } //End while
				}//End if
				else {
				    echo "0 results";
				}
			 ?>
			</tbody>
			</table>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>