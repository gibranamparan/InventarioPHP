<?php 
	session_start();
	$estaLogeado = isset($_SESSION['userID']);
	if(!$estaLogeado){
		header("location: /inventario/usuarios/login.php");
	}
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'\conectar_db.php');
	
	//Se ha buscado algo en el filtro?
		//Se genera un query para filtrar
	//Si no
		//Codigo para ejecutar query
		$sql = "SELECT * FROM equipo";
		$result = $conn->query($sql);

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
	<!-- Se esta insertando el menú-->
	<?php require(__ROOT__.'\render_menu.php');?>
	
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<a href="registrar_equipo.php">Nueva Equipo</a>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Equipos</strong>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Cantidad Maxima</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["equipoID"]?></td>
			    	<td><?php echo $row["nombre"]?></td>
			    	<td><?php echo $row["costo"]?></td>
			    	<td><?php echo $row["cantidadMaxima"]?></td>
			    	<td>
			    		<a href="borrar_equipo.php?equipoID=<?php echo $row['equipoID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="modificar_equipo.php?equipoID=<?php echo $row['equipoID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
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