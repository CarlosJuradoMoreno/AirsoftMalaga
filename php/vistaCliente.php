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
	<title>AirsoftMalaga</title>
	<link rel="stylesheet" type="text/css" href="../css/css4.css">
</head>
<body>
	<button><a href="cerrarSesion.php">Cerrar Sesión</a></button>
	<form method="get">
	<select name="campo">
		<?php
		$consulta = $conexion->query("SELECT * FROM campos where '1'");
		while ($campo = $consulta->fetchObject()){
			echo $campo->Id_Campo;
			?>
			<option value='<?= $campo->Id_Campo?>'><?=$campo->Nombre_Campo?> </option>
			<?php
		}
		?>
		<input type="submit" value="Ver Partida">
	</select>
	
	</form>
	<table border="1">
	<tr>
		<td><b>Nombre</b></td>
		<td><b>Replica</b></td>
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
		echo $query;
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
		?><a href="inscribirse.php?campo=<?=$_GET['campo']?>"><button>Inscribirse</button></a><?php
	}else{
		?><a href="inscribirse.php?campo=1"><button>Inscribirse</button></a><?php
	}

?>

</body>
</html>
<?php
}
?>