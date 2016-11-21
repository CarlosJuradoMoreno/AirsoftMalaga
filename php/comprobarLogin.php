<?php
	session_start();
	try {
		$conexion = new PDO("mysql:host=localhost:3306;dbname=airsoft", "id191248_admin", "admin");
		echo "Se ha establecido una conexión con el servidor de bases de datos.";
	} catch (PDOException $e) {
		echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
		die ("Error: " . $e->getMessage());
	}

	$sql="SELECT * FROM jugador where Nombre_Usuario='".$_GET["nombre"]."'";			//Creamos el sql
	$consulta = $conexion->query($sql);			//Se ejecuta el sql y se guarda el resultado en consulta
	if(($consulta->rowCount()) > 0){		//Si existe el nombre de usuario
		$consulta = $conexion->query("SELECT Pass_Usuario FROM jugador where Nombre_Usuario='".$_GET["nombre"]."'");		//CONSULTA PARA LA CONSTRASEÑA
		$var =$consulta->fetchObject();		//CREAMOS UN OBJETO CON EL RESULTADO Y LO GUARDAMOS EN VAR
		if(($var->Pass_Usuario)==$_GET["pass"]){			//COMPROBAMOS LA COLUMNA Pass_Usuario DEL OBJETO
			$consulta=$conexion->query("SELECT Tipo_Usuario, Id_Jugador FROM jugador where Nombre_Usuario='".$_GET["nombre"]."'");
			$var =$consulta->fetchObject();		//REPETIMOS LO DE ANTES, LA FORMA DE SACAR EL STRING ES ESTA
			$_SESSION["conectado"] =($var->Tipo_Usuario);				//LE ASINAMOS AL USUARIO CONECTADO SU TIPO
			$_SESSION["idUsuario"] = ($var->Id_Jugador);
			echo "<br> tipo: ".($var->Tipo_Usuario);
			echo "<br> id: ".($var->Id_Jugador);
			header('Location: ../index.php');
		}else{
			echo"<br>Contrasenia incorrecta";
			header('Location: login.php?pass=Contrasenia incorrecta');
		}
	}else{
		echo "No existe la cuenta";
		header('Location: login.php?pass=Cuenta inexistente');
	}


?>