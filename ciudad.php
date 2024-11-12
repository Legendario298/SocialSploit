<?php
$conexion = new mysqli("localhost", "root", "", "ejercicio2");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if(isset($_POST['id_departamento'])) {
    $id_departamento = $_POST['id_departamento'];
    $sql = "SELECT * FROM ciudad WHERE id_departamento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_departamento);
    $stmt->execute();
    $resultado = $stmt->get_result();

    echo '<option value="">Selecciona una ciudad</option>';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<option value="'.$fila['id_ciudad'].'">'.$fila['ciudad'].'</option>';
    }

    $stmt->close();
}

$conexion->close();
?>