<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM Pacientes WHERE  id='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);
echo "<script>window.location.href = 'index.php';</script>";

?>