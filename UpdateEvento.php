<?php

setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento         = $_POST['idEvento'];

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
$pacienteId        = $_REQUEST['pacienteId'];


// Obtener el pacienteId de la tabla Pacientes
$query = "SELECT paciente FROM Pacientes WHERE id = $pacienteId";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$evento = $row['paciente'];

//convertir fecha al formato que quiere fullcalendar
$fecha_hora_str = $fecha_inicio . 'T' . $hora_inicio;

$timestamp = $fecha_hora_str;

//misma conversion de fecha para la cita
$fecha_hora_str = $fecha_inicio . 'T' . $hora_fin;

$timestamp2 = $fecha_hora_str;

$UpdateProd = ("UPDATE eventoscalendar 
    SET 
        evento ='$evento',
        pacienteId = '$pacienteId',
        fecha_inicio ='$timestamp',
        fecha_prox ='$fecha_prox',
        fecha_pago ='$fecha_pago',
        fecha_fin ='$timestamp2',
        pago = '$pago',
        tratamiento = '$tratamiento',
        observacion = '$observacion',
        color_evento ='$color_evento',
        asistio ='$asistio'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:index.php?ea=1");
?>