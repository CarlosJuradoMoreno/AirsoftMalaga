<html>
<head>
	<title>Modificar Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/css9.css">
</head>
<body class="modificar">
	<?php
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	$query=("SELECT * FROM jugador WHERE Id_Jugador='".$_GET["id"]."'");
	$consulta= $conexion->query($query);
	$var=$consulta->fetchObject();
	?>
	<div >
		<ul id="modificar-lista">
			<li><b>Nombre: </b><?=$var->Nombre_Jugador?></li>
			<li><b>Replica: </b><?=$var->Replica_Jugador?></li>
			<li><b>Edad: </b><?=$var->Edad?></li>
			<li><b>Nombre de usuario: </b><?=$var->Nombre_Usuario?></li>
			<li><b>Contraseña: </b><?=$var->Pass_Usuario?></li>
		</ul>

	</div>
<div id="modificar-form">
<form method="get" action="modificarUsuario.php">
	<label class="labelform">Nombre: </label><input type="text" name="nombre" value="<?=$var->Nombre_Jugador?>" autofocus><br>
	<label class="labelform">Replica: </label><input type="text" name="replica"  value="<?=$var->Replica_Jugador?>" ><br>
	<label class="labelform">Edad: </label><input type="number" name="edad"  value="<?=$var->Edad?>" ><br>
	<label class="labelform">Nombre de usuario: </label><input type="text" name="usuario" required autocomplete="off"  value="<?=$var->Nombre_Usuario?>" ><br><br>
	<label class="labelform">Contraseña: </label><input type="text" name="pass" required autocomplete="off"  value="<?=$var->Pass_Usuario?>" ><br>
	<input type="hidden" name="tipo" value="cliente">
	<input type="hidden" name="id" value="<?=$_GET["id"]?>">
	<input id="submit" type="submit" value="Modificar">
	</form>
</div>
</body>
</html>