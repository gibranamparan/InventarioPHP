<?php 
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__."\conectar_db.php");

	if(isset($_POST["btnLogin"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		//Codigo para ejecutar query
		$sql = "SELECT * FROM users
				WHERE username = '$username' AND password = '$password' ";
		$result = $conn->query($sql);


		//Si el usuario existe y se autentifico correctamente
		if($result->num_rows>0){//Se crea su sesion
			//Tomar el renglon con los datos del usuario logeado
			$renglon_usuario = $result->fetch_assoc();
			//Inicia sesion, crea cookie y reserva memoria
			session_start();

			//Guardamos datos del usuario
			$_SESSION['userID'] = $renglon_usuario['userID'];
			$_SESSION['username'] = $renglon_usuario['username'];

			header("location: /inventario/index.php");
		}else{
			$mensaje_error = "El nombre de usuario y contraseña no fueron validos, inténtelo de nuevo.";
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
	<?php require_once(__ROOT__."/render_menu.php") ?>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Ingresar</strong>
		</div>
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-2" for="username">Usuario:</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="usuario" name="username" placeholder="Usuario">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-2" for="password">Contraseña:</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña:">
			      </div>
			    </div>			
			    <button class="btn btn-primary" name="btnLogin">Ingresar</button>
			    <a class="btn btn-primary" name="btnRegistrar" href="register.php">Registrase</a>
			</form>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	<?php
	if(isset($mensaje_error))
	{
	echo '<p class="alert alert-danger">'.$mensaje_error.'</p>';
	}
	?>
	</div><!-- Cierre de container -->
</body>
</html>