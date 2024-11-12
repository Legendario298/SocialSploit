<?php
$conexion = new mysqli("localhost", "root", "", "ejercicio2");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM pais";
$resultado = $conexion->query($sql);

$paises = [];
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $paises[] = $fila;
    }
}

$conexion->close();
?>