<?php
	session_start();
	if(!isset($_SESSION["conectado"])){			//Si no esta conectao, redirige al log in
		header('Location: php/login.php');
	}else if(isset($_SESSION["conectado"])&&($_SESSION["conectado"]=="cliente")){
		header('Location: php/vistaCliente.php');
		}else if(isset($_SESSION["conectado"])&&$_SESSION["conectado"]=="admin"){
			header('Location: php/vistaAdmin.php');
}	
echo "usuario: ".$_SESSION["conectado"];
//header('Location: php/login.php');


?>