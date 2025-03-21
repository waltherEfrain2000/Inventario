<?php

$host = "caboose.proxy.rlwy.net";
$port = "12287"; 
$dbname = "railway";
$user = "root";
$password = "gGHiPnIGVpoCODEfsZsXOoDcZRWskhzB";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo; // Asegúrate de que devuelva la conexión
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

