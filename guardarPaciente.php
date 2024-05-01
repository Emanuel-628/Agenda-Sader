<?php

require("config.php");

$nombre_paciente = ucwords($_REQUEST['pacienteId']);

$sql = "INSERT INTO Pacientes (pacienteId) VALUES ('" .$nombre_paciente. "')";

$resultadoNuevoEvento = mysqli_query($con, $sql);

header("Location:index.php?e=1");

?>
