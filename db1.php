<?php
// Aquí estableceremos la conexión a la base de datos.

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mindverse'; // Nombre de la base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
