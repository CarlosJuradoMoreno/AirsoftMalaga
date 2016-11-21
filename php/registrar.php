<html>
<head>
	<title>Registro de usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/css4.css">
</head>
<body class="registro">
<div >
<form method="get" action="registrarUsuario.php">
	<label class="labelform">Nombre: </label><input type="text" name="nombre" autofocus><br>
	<label class="labelform">Replica: </label><input type="text" name="replica"><br>
	<label class="labelform">Edad: </label><input type="number" name="edad" ><br>
	<label class="labelform">Nombre de usuario: </label><input type="text" name="usuario" required autocomplete="off"><br><br>
	<label class="labelform">Contraseña: </label><input type="text" name="pass" required autocomplete="off"><br>
	<input type="hidden" name="tipo" value="cliente">
	<input id="submit" type="submit" value="Registrar">
	</form>
</div>
</body>
</html>