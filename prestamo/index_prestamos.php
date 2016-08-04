<?php 
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'\conectar_db.php');

	$personaID = $_GET["personaID"];
	//Codigo para ejecutar query
	$sql = "SELECT * FROM vistaprestamos
			WHERE personaID = $personaID";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();
	$result->data_seek(0);
	$nombrePersonas = $row["nombrePersonas"];

	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Equipos</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">InventarioDB</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="/inventario/">Personas</a></li>
	      <li><a href="/inventario/index_equipo.php">Equipo</a></li> 
	    </ul>
	  </div>
	</nav>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<a href="registrar_prestamo.php?personaID=<?php echo $personaID?>">Nueva Prestamo</a>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Prestamos</strong>
		</div>
		<div class="panel-body">
			<div><strong>Persona: </strong><?php echo $nombrePersonas?></div>
			<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Equipo</th>
					<th>Fecha de Prestamo</th>
					<th>Fecha de Entrega</th>
					<th>Fecha de Entregado</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["prestamoID"]?></td>
			    	<td><?php echo $row["nombreEquipo"]?></td>
			    	<td><?php echo $row["fechaPrestamo"]?></td>
			    	<td><?php echo $row["fechaEntrega"]?></td>
			    	<td><?php echo $row["fechaEntregado"]?></td>
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