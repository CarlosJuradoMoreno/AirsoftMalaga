<?php
	session_start();	
	if(isset($_SESSION["conectado"])&&$_SESSION["conectado"]=="cliente"){
		header('Location: /php/vistaCliente.php');
		}else if(isset($_SESSION["conectado"])&&$_SESSION["conectado"]=="admin"){
			header('Location: /php/vistaAdmin.php');
		}else{
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AirsoftMalaga</title>
	<link rel="stylesheet" type="text/css" href="../css/css15.css">
</head>
<body class="login">
	<h1>AirsoftMalaga</h1>
	<div id="cuadroFormulario">
	<form method="get" action="../php/comprobarLogin.php">
		<p><label class="labelform">Usuario:</label> <br><input type="text" name="nombre" autocomplete="off" autofocus  ><br></p>
		<p><label class="labelform">Contraseña: </label><br><input type="pass"name="pass" autocomplete="off" ><br></p>
		<div>
	<ul>
		<li><input id="enviar" type="submit" value="Conectate"><br></li>
	<li><button id="login-registro"><a href="registrar.php">Registrate</a></button></li>
	</ul>
	</div>
		<?php
		if (isset($_GET["pass"])) {
			echo $_GET["pass"];
		}
		?>

	</form>
</div>

</body>
</html>


<?php
	
}
?>