<?php
session_start();
	if(!isset($_SESSION["conectado"])){			//Si no esta conectao, redirige al log in
		header('Location: login.php');
	}else{
		echo $_SESSION["idUsuario"];
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	$query=("SELECT Id_Partida FROM partida WHERE Campo='".$_GET["campo"]."'");
	echo $query;
	$consulta = $conexion->query($query);	
	$var= $consulta->fetchObject();
	echo $var ->Id_Partida;
	$query=("INSERT INTO `jugador_partida` (`Jugador`, `Partida`, `Id_Jugador_Partida`) VALUES ('".$_SESSION['idUsuario']."', '".($var ->Id_Partida)."', NULL);");
	echo $query;
	$conexion->query($query);
	header('Location: ../index.php');

	}


?>