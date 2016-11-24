<?php
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();
	


	$sql=("UPDATE `jugador` SET `Nombre_Jugador` = '".$_GET["nombre"]."', `Replica_Jugador` = '".$_GET["replica"]."', `Edad` = '".$_GET["edad"]."'
		, `Nombre_Usuario` = '".$_GET["usuario"]."' , `Pass_Usuario` = '".$_GET["pass"]."' 	WHERE `jugador`.`Id_Jugador` = ".$_GET["id"].";");
	$consulta= $conexion->query($sql);
	echo $sql;
	header('Location: ../index.php');
?>