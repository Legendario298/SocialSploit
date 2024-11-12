<?php
$conexion = new mysqli("localhost", "root", "", "ejercicio2");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if(isset($_POST['id_pais'])) {
    $id_pais = $_POST['id_pais'];
    $sql = "SELECT * FROM departamento WHERE id_pais = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_pais);
    $stmt->execute();
    $resultado = $stmt->get_result();

    echo '<option value="">Selecciona un departamento</option>';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<option value="'.$fila['id_departamento'].'">'.$fila['departamento'].'</option>';
    }

    $stmt->close();
}

$conexion->close();
?>