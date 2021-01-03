<?php 
include 'clases.php';
 ?>

<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM t_usuario;");
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>CRUD Registro de alumnos</title>
	<meta charset="utf-8">
</head>

<body>



<div class="container">

<br>
<!-- Inicio NavBar -->
	<nav>
	<ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="ingresar.php">Ingresar</a></li>
        <li><a href="#">Servicios</a>
            <ul><li><a href="">Servicio 1</a></li>
            <li><a href="">Servicio 2</a></li>
            <li><a href="">Servicio 3</a></li>
            <li><a href=""></a>Servicio 4</li></ul>
            </li>
        <li><a href="Ingresar_usuario.php">Crear Usuarios</a></li>
        <li><a href="listar_usuarios.php">Listar Usuarios</a></li>
        <li><a href="cerrar.php">Salir</a></li>
    </ul>
</nav>
<!-- Final NavBar -->

<header>
	<img src="img/banner2.png" alt="">
</header>



<h2>Usuarios del Sistema</h2>
<hr>
<table class="table table-bordered">
  
  <thead>

    <tr>
      <th>Id_Usuario</th>
      <th>Nombre Usuario</th>
      <th>Password</th>
      <th>Estado</th>
      
    </tr>

  </thead>
<tbody>

			<?php 
				foreach ($usuarios as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_usuario; ?></td>
						<td><?php echo $dato->nombre_usu; ?></td>
						<td><?php echo $dato->password_usu; ?></td>
						<td><?php echo $dato->estado; ?></td>
						<td><a href="editar_usu.php?id=<?php echo $dato->id_usuario; ?>" class="btn btn-info">Editar</a></td>
						<td><a href="eliminar_usu.php?id=<?php echo $dato->id_usuario; ?>" class="btn btn-danger">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

	
<!--inicio footer -->
<br>
<?php 
include 'footer.php';
 ?>

<!-- fin footer -- >
</div>

</body>
</html>