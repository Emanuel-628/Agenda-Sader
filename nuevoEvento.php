<?php

setlocale(LC_ALL,"es_ES");

require("config.php");
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 
$hora_inicio       = ucwords($_REQUEST['hora_inicio']);
$hora_fin          = ucwords($_REQUEST['hora_fin']);
$fecha_prox        = ucwords($_REQUEST['fecha_prox']);
$fecha_pago        = ucwords($_REQUEST['fecha_pago']);
$pago              = ucwords($_REQUEST['pago']);
$tratamiento       = ucwords($_REQUEST['tratamiento']);
$observacion       = ucwords($_REQUEST['observacion']);  
$color_evento      = $_REQUEST['color_evento'];
$asistio           = $_REQUEST['optradio'];

//convertir fecha al formato que quiere fullcalendar
$fecha_hora_str = $fecha_inicio . 'T' . $hora_inicio;

$timestamp = $fecha_hora_str;

//misma conversion de fecha para la cita
$fecha_hora_str = $fecha_inicio . 'T' . $hora_fin;

$timestamp2 = $fecha_hora_str;

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


$InsertNuevoEvento = "INSERT INTO eventoscalendar(
      evento,
      fecha_inicio,
      fecha_prox,
      fecha_pago,
      fecha_fin,
      pago,
      tratamiento,
      observacion,
      color_evento,
      asistio,
      foto
      )
    VALUES (
      '" .$evento. "',
      '". $timestamp."',
      '". $fecha_prox."',
      '". $fecha_pago."',
      '" .$timestamp2. "',
      '" .$pago. "',
      '" .$tratamiento. "',
      '" .$observacion. "',
      '" .$color_evento. "',
      '" .$asistio. "',
      '" .$nombreImagenEscapado. "'
  )";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:index.php?e=1");

?>