<?php
//INSERTAR EN EL REGISTRO
session_start();
	require_once 'conexion.php';
	$conexion = ConexionDB::connectDB();

	if(isset($_GET["nombre"])){
		$nombre=$_GET['nombre'];
		$replica=$_GET['replica'];
		$edad=$_GET['edad'];
		$usuario=$_GET["usuario"];
		$pass=$_GET["pass"];
		$tipo=$_GET["tipo"];
		if($usuario==$pass){
			header('Location: login.php?pass=Nombre y usuario iguales');
		}else{


		
		$sql="INSERT INTO jugador (Id_Jugador, Nombre_Jugador, Replica_Jugador, Edad, Nombre_Usuario, Pass_Usuario, Tipo_Usuario)
						 VALUES (NULL, '".$nombre."', '".$replica."', '".$edad."', '".$usuario."', '".$pass."', '".$tipo."');";
		echo $sql;
		$conexion->exec($sql);
		header('Location: ../pruebas/login.php?pass=Comprueba tu cuenta');
	}
		header('Location: ../index.php');
}
?>