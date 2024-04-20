<?php
//date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento         = $_POST['idEvento'];

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

$UpdateProd = ("UPDATE eventoscalendar 
    SET evento ='$evento',
        fecha_inicio ='$fecha_inicio',
        hora_inicio ='$hora_inicio',
        fecha_fin ='$fecha_fin',
        pago = '$pago',
        tratamiento = '$tratamiento',
        observacion = '$observacion',
        color_evento ='$color_evento'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:index.php?ea=1");
?>