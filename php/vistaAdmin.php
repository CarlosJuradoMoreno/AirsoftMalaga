<?php
	session_start();
	if(!isset($_SESSION["conectado"])){			//Si no esta conectao, redirige al log in
		header('Location: login.php');
	}else if(isset($_SESSION["conectado"])&&$_SESSION["conectado"]=="cliente"){
		header('Location: vistaCliente.php');
		}else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AirsoftMalaga</title>
	<link rel="stylesheet" type="text/css" href="../css/css4.css">
</head>
<body class="vistaAdmin">
	<?php
	//CONExiON A lA BASE DE DATOS
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	$consulta = $conexion->query("SELECT * FROM jugador");
?>
	
	<table border="1">
	<tr>
		<td><b>Nombre</b></td>
		<td><b>Replica</b></td>
		<td><b>Edad</b></td>
		<td><b>Borrar</b></td>
		<td><b>Modificar</b></td>
		<td><b>Usuario</b></td>
	</tr>
	<?php
		while ($jugador = $consulta->fetchObject()) {
	?>
	
	<tr>
		<td><?= $jugador->Nombre_Jugador ?></td>
		<td><?= $jugador->Replica_Jugador ?></td>
		<td><?= $jugador->Edad ?></td>
		<td><?= $jugador->Nombre_Usuario ?></td>
		<td><a href="borrar.php?id=<?=($jugador->Id_Jugador)?>"><button>Borrar</button></a></td>
		<form method="get" action="modificar.php"><td><input type="submit" value="Modificar">

		</td></form>
	</tr>
	
	<?php
	}
	?>
</table><br>
<a href="cerrarSesion.php"><button>Cerrar Sesión</button></a>

<div id="registro">
<form method="get" action="registrarUsuario.php">
	<label class="labelform">Nombre: </label><input type="text" name="nombre"/><br>
	<label class="labelform">Replica: </label><input type="text" name="replica"/><br>
	<label class="labelform">Edad: </label><input type="number" name="edad" /><br>
	<label class="labelform">Nombre de usuario: </label><input type="text" name="usuario" /><br><br>
	<label class="labelform">Contraseña: </label><input type="text" name="pass"/><br>
	<label class="labelform">Tipo de usuario: </label><select name="tipo"><option value="cliente">Jugador</option><option value="admin">Administrador</option></select><br>
	<input type="submit" value="Registrar">
	</form>
</div>
</body>
</html>
<?php
}		//Cerramos if
?>