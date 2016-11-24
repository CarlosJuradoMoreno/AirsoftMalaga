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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>AirsoftMalaga</title>
	<link rel="stylesheet" type="text/css" href="../css/css15.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body class="vistaAdmin">
	<?php
	//CONExiON A lA BASE DE DATOS
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	$consulta = $conexion->query("SELECT * FROM jugador");
?>
	
	<table class="table-striped  col-md-12" id="vistaAdmin-tabla">
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
		<td><a href="borrar.php?id=<?=($jugador->Id_Jugador)?>"><button class="btn btn-danger">Borrar</button></a></td>
		<td><a href="modificar.php?id=<?=($jugador->Id_Jugador)?>"><button class="btn btn-warning">Modificar</button></a></td>

		</td></form>
	</tr>
	
	<?php
	}
	?>
</table><br>


<div id="vistaAdmin-registro" class="col-md-6 col-xs-12 col-sm-8">
<form method="get" action="registrarUsuario.php">
	<div class="form-group"><label class="col-xl-2-form-label">Nombre </label><div class="col-xs-12"><input class="form-control" type="text" name="nombre"/></div></div>
	<div class="form-group" class=""><label class="col-xs-2-form-label">Replica</label><div class="col-xs-12"><input class="form-control" type="text" name="replica"/></div></div>
	<div class="form-group"><label class="col-xs-2-form-label">Edad</label>	<div class="col-xs-12"><input class="form-control" type="number" name="edad" /></div></div>
	<div class="form-group"><label class="col-xs-2-form-label">Nombre de usuario</label><div class="col-xs-12"><input class="form-control" type="text" name="usuario" /></div></div>
	<div class="form-group"><label class="col-xs-2-form-label">Contraseña</label><div class="col-xs-12"><input class="form-control" type="text" name="pass"/></div></div>
	<div class="form-group"><label class="col-xs-2-form-label">Tipo de usuario </label>	<div class="col-xs-12"><select class="form-control" name="tipo"><option value="cliente">Jugador</option><option value="admin">Administrador</option></select><br></div></div>
	<input  class="btn btn-secondary btn-lg btn-block" type="submit" value="Registrar">
	</form>
</div>
<a href="cerrarSesion.php" class="col-xs-4"><button>Cerrar Sesión</button></a>
</body>
</html>
<?php
}		//Cerramos if
?>