<?php 
include 'clases.php';
 ?>

<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumno;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
        <li><a href="Ingresar_usuario.php">Listar Usuarios</a></li>
        <li><a href="listar_usuarios.php">Listar Usuarios</a></li>
        <li><a href="cerrar.php">Salir</a></li>
    </ul>
</nav>
<!-- Final NavBar -->

<header>
	<img src="img/banner2.png" alt="">
</header>



<h3>Ingresar alumnos:</h3>
		<form method="POST" action="insertar_usuario.php">
			<table class="table-bordered">
				<tr>
					<td>Nombre Usuario: </td>
					<td><input type="text" size="80" name="txtNom_usu"></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="text" size="80" name="txtPass_usu"></td>
				</tr>
				
				<tr>
					<td>Estado: </td>
					<td><input type="text" size="5" name="txt_esta"></td>
				</tr>

				<input type="hidden" name="oculto" value="1">
				<tr>
				<td><input type="reset" name="" value="LIMPIAR DATOS" class="btn btn-danger"></td>
				<td><input type="submit" value="INGRESAR USUARIOS" class="btn btn-info"></td>
				</tr>
			</table>
		</form>

	<!--inicio footer -->
<br>
<?php 
include 'footer.php';
 ?>
 <!-- fin footer -- >
</div>

</body>
</html>