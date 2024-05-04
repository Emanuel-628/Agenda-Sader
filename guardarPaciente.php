<?php

require("config.php");

$nombre_paciente = ucwords($_REQUEST['pacienteId']);

// Manejo de la imagen
$nombreImagen = $_FILES['foto']['name'];
$rutaTemporal = $_FILES['foto']['tmp_name'];
$rutaUploads = $_SERVER['DOCUMENT_ROOT'] . '/agenda/uploads';
$rutaDestino = $rutaUploads . '/' . $nombreImagen;

// Verifica si la carpeta uploads existe, si no, la crea
if (!is_dir($rutaUploads)) {
    mkdir($rutaUploads, 0777, true);
}

// Mueve la imagen de la ruta temporal a la ruta de destino
move_uploaded_file($rutaTemporal, $rutaDestino);

$nombreImagenEscapado = mysqli_real_escape_string($con, $nombreImagen);

$sql = "INSERT INTO Pacientes (pacienteId,foto) VALUES ('" .$nombre_paciente. "','" .$nombreImagenEscapado. "')";

$resultadoNuevoEvento = mysqli_query($con, $sql);

header("Location:index.php?e=1");

?>
