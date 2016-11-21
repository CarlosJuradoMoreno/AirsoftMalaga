<?php
	session_start();
	if(!isset($_SESSION["conectado"])){			//Si no esta conectao, redirige al log in
		header('Location: login.php');
	}else{
require_once 'conexion.php';
$conexion = ConexionDB::connectDB();
$sql = "DELETE FROM `jugador` WHERE `jugador`.`Id_Jugador` = '".$_GET['id']."'";
$conexion->exec($sql);
header('Location: ../index.php');
}
?>
