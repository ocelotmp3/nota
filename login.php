<?php 
include 'clases.php';
 ?>


<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}else{
		echo "<script>alert('Usuario Incorrecto. Intente de nuevo!')</script>";
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<meta charset="utf-8">
</head>
<body>

<div class="container">

<header>
	<img src="img/banner2.png" alt="">
</header>

<br><br>
<center>	
		<form method="POST" action="loginProceso.php" class="form">
			<label>Usuario:&nbsp;&nbsp;&nbsp;&nbsp; </label>
			<input type="text" name="txtUsu" size="40">
			<br>
			<label>Password: </label>
			<input type="password" name="txtPass" size="40">
			<br><br>
			<input type="submit" value="Iniciar sesión" class="btn btn-danger">
		</form>
</center>

<?php 
include 'script.php'
 ?>	

</div>	
</body>
</html>