<?php
abstract class ConexionDB {
private static $server = 'localhost';
private static $db = 'airsoft';
private static $user = 'admin';
private static $password = 'admin';
public static function connectDB() {
try {
$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db, self::$user, self::$password);
} catch (PDOException $e) {
echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
die ("Error: " . $e->getMessage());
}
return $connection;
}
}