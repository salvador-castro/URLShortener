<?php
$host = 'localhost';
$dbname = 'url_shortener';
$username = 'root'; // Cambiar según configuración
$password = ''; // Cambiar según configuración

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>