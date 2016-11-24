<?php
	session_start();
	if(!isset($_SESSION["conectado"])){			//Si no esta conectao, redirige al log in
		header('Location: login.php');
	}else if(isset($_SESSION["conectado"])&&$_SESSION["conectado"]=="admin"){
		header('Location: vistaAdmin.php');
		}else{
			require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AirsoftMalaga</title>
	<link rel="stylesheet" type="text/css" href="../css/css15.css">
</head>
<body class="vistaCliente">
	<nav id="vistaCliente-nav">
		<a id="nav-cerrarSesion" href="cerrarSesion.php"><div class="iconos" id="icono-salida"></div></a>
	</nav>
	<div id="vistaCliente-cuerpo">
	<div id="vistaCliente-titulo">Airsoft Malaga</div>

	<div id="vistaCliente-contenedor-lista">
	<ul id="vistaCliente-lista">
		<?php
		$consulta = $conexion->query("SELECT * FROM campos where '1'");
		while ($campo = $consulta->fetchObject()){
			?>
			<a href="vistaCliente.php?campo=<?= $campo->Id_Campo?>"><li><?=$campo->Nombre_Campo?> </li></a>
			<?php
		}
		?>
	</ul>
</div>
	
	<div id="vistaCliente-contenedor-tabla">
	<table id="vistaCliente-tabla">
	<tr>
		<td><b>Nombre</b><div class="iconos" id="icono-soldado"></div></td>
		<td><b>Replica<div class="iconos" id="icono-rifle" ></div></b></td>
		<td><b>Edad</b></td>
	</tr>
	<?php
	//Lista de jugadores
	if (!isset($_GET["campo"])){
		
		$query=("SELECT * FROM jugador LEFT JOIN jugador_partida ON jugador.Id_Jugador=jugador_partida.Jugador LEFT JOIN partida ON partida.Id_Partida=jugador_partida.Partida WHERE partida.campo='1'");
		}else{
			$camp=$_GET["campo"];
			$query=("SELECT * FROM jugador LEFT JOIN jugador_partida ON jugador.Id_Jugador=jugador_partida.Jugador LEFT JOIN partida ON partida.Id_Partida=jugador_partida.Partida WHERE partida.campo='".$camp."'");
		}
		$consulta = $conexion->query($query);
		while ($jugador = $consulta->fetchObject()) {
	?>
	<tr>
		<td><?= $jugador->Nombre_Jugador ?></td>
		<td><?= $jugador->Replica_Jugador ?></td>
		<td><?= $jugador->Edad ?></td>
	</tr>
	
	<?php
	}
	?>
</table><br>
<?php
	if (isset($_GET["campo"])) {
		?><a  href="inscribirse.php?campo=<?=$_GET['campo']?>"><button id="vistaCliente-inscribirse">Inscribirse</button></a><?php
	}else{
		?><a  href="inscribirse.php?campo=1"><button id="vistaCliente-inscribirse">Inscribirse</button></a><?php
	}

?>
</div>
	
	<div id="vistaCliente-carrusel-contenedor">
	<ul id="vistaCliente-carrusel">

		<li class="vistaCliente-carrusel-elemento"><img class="vistaCliente-carrusel-elemento-img" src="../images/tba960.jpg"></li>
		<li class="vistaCliente-carrusel-elemento"><img class="vistaCliente-carrusel-elemento-img" src="../images/bateria16.jpg"></li>
		<li class="vistaCliente-carrusel-elemento"><img class="vistaCliente-carrusel-elemento-img" src="../images/minerva960.jpg"></li>
		
	</ul>
</div>
</div>
</body>
</html>
<?php
}
?>