<?php
  session_start();
  //Se identifica si el usuario esta o no logeado
  $estaLogueado = isset($_SESSION['userID']);

  //Toma los datos de sesion si esta logeado
  if($estaLogueado){
    $userID = $_SESSION['userID'];
    $username = $_SESSION['username'];
  }

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">InventarioDB</a>
    </div>
    
    <!--SI ESTA LOGEADO, LE MUESTRAS LOS ENLACES-->
    <?php if ($estaLogueado) {?>
    <!--menu de navegacion-->
      <ul class="nav navbar-nav">
        <li>
          <a href="/inventario/">Personas</a>
        </li>
        <li>
          <a href="/inventario/equipo/index_equipos.php">Equipo</a>
        </li>
      </ul>
    <?php } ?>

    <ul class="pull-right nav navbar-nav">
      <li>
      <?php if (!$estaLogueado) {?>
        <!--Este enlace se muestra cuando estas deslogeado-->
        <a href="/inventario/usuarios/login.php">Ingresar</a>
      <?php } else { ?>
        <!--Este enlace se muestra cuando estas LOGEADO-->
        <div>
          Bienvenido <?php echo $username?>
          <br> <a href="/inventario/usuarios/logout.php">Cerrar Sesion</a>
        </div> 
      <?php }?>
      </li>
    </ul>
  </div>
</nav>