<?php 
	//Código para conectar
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'\conectar_db.php');

	if(isset($_POST["btnLogin"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO users(username, password)
				value('$username','$password')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /inventario/usuarios/login.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de nuevo usuario</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once(__ROOT__."/render_menu.php") ?>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Registro de nuevo usuario</strong>
		</div>
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-2" for="username">Usuario:</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="usuario" name="username" placeholder="Usuario" required="">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-2" for="password">Contraseña:</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña:" required="">
			      </div>
			    </div>	
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="email">Confirmar contraseña:</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="confirmarPassword" name="confirmarPassword" placeholder="Confirmar contraseña:" required="">
			      </div>
			    </div>			
			    <button class="btn btn-primary" disabled="" name="btnLogin" id="btnLogin">Registrar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
<script type="text/javascript">
	//El boton de registro tiene que habilitarse ante dos condiciones
	//Que ambas contraseñas sean iguales
	//Que ambos campos de contraseña tengan datos

	$("#password, #confirmarPassword").keyup(function(){
		var password=$('#password').val();
		var confirmarPassword=$('#confirmarPassword').val();
		if(password.length>0 && password == confirmarPassword){
			$("#btnLogin").prop('disabled', false);
		}else{
			$("#btnLogin").prop('disabled', true);
		}
	});

</script>
</html>