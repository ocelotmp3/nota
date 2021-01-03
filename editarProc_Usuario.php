<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$nombreusuario = $_POST['txtNom_usuario'];
	$passusuario = $_POST['txtPass_usu'];
	$estado = $_POST['txtEstado_usu'];
	
	$sentencia = $bd->prepare("UPDATE t_usuario SET nombre_usu = ?, password_usu = ?, estado = ? WHERE id_usuario = ?;");
	$resultado = $sentencia->execute([$nombreusuario,$passusuario,$estado, $id2]);

	if ($resultado === TRUE) {
		header('Location: listar_usuarios.php');
	}else{
		echo "Error";
	}
?>