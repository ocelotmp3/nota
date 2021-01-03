<?php 
include 'clases.php';
 ?>

<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM t_usuario WHERE id_usuario = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuarios del Sistema</title>
	<meta charset="utf-8">
</head>
<body>

<div class="container">

<header>
	<img src="img/banner2.png" alt="">
</header>


	
		<h2>Editar Usuarios del Sistema:</h2>
		<form method="POST" action="editarProc_Usuario.php">
			<table class="table table-striped">
				<tr>
					<td>Id de Usuario: </td>
					<td><input type="text"  size="3" name="txt_id_usu" value="<?php echo $persona->id_usuario; ?>"></td>
				</tr>
				<tr>
					<td>Nombre Usuario: </td>
					<td><input type="text" size="40" name="txtNom_usuario" value="<?php echo $persona->nombre_usu; ?>"></td>
				</tr>
				<tr>
					<td>PassWord: </td>
					<td><input type="text" size="30" name="txtPass_usu" value="<?php echo $persona->password_usu; ?>"></td>
				</tr>
				<tr>
					<td>Estado: </td>
					<td><input type="text" name="txtEstado_usu" value="<?php echo $persona->estado; ?>"></td>
				</tr>
				
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_usuario; ?>">
					<td colspan="2"><input type="submit" value="ACTUALIZAR" class="btn btn-info"></td>
				</tr>
			</table>
		</form>
	</div>

<?php 
include 'footer.php';
 ?>
	
</div>


<?php 
include 'script.php'
 ?>	

</body>
</html>