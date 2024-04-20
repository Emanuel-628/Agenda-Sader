<?php
//date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 
$hora_inicio       = ucwords($_REQUEST['hora_inicio']);

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));   

$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));
$pago              = ucwords($_REQUEST['pago']);
$tratamiento       = ucwords($_REQUEST['tratamiento']);
$observacion       = ucwords($_REQUEST['observacion']);  
$color_evento      = $_REQUEST['color_evento'];


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
// Guardar $nombreImagen en la base de datos junto con otros datos del evento
// Haz la conexión a la base de datos y realiza la inserción
// Ten en cuenta la seguridad al manejar datos de usuario para evitar inyección SQL
// Escapa el nombre de la imagen para evitar inyección SQL
$nombreImagenEscapado = mysqli_real_escape_string($con, $nombreImagen);


$InsertNuevoEvento = "INSERT INTO eventoscalendar(
      evento,
      fecha_inicio,
      hora_inicio,
      fecha_fin,
      pago,
      tratamiento,
      observacion,
      color_evento,
      foto
      )
    VALUES (
      '" .$evento. "',
      '". $fecha_inicio."',
      '". $hora_inicio."',
      '" .$fecha_fin. "',
      '" .$pago. "',
      '" .$tratamiento. "',
      '" .$observacion. "',
      '" .$color_evento. "',
      '" .$nombreImagenEscapado. "'
  )";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:index.php?e=1");

?>