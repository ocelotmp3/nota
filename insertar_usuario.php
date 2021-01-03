<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$nomusu = $_POST['txtNom_usu'];
	$passusu = $_POST['txtPass_usu'];
	$estado=$_POST['txt_esta'];
	

	$sentencia = $bd->prepare("INSERT INTO t_usuario(nombre_usu,password_usu,estado) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$nomusu,$passusu,$estado]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error. Datos no insertados!";
	}
?>