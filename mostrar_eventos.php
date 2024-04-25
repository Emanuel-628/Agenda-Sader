<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

<!-- CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- JavaScript de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JavaScript de DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <div class="container mt-3">
        <h3 class="text-center">Lista de Pacientes</h3>
        <div id="listaEventos" class="mt-3">
            <?php
            
            // Incluir el archivo de configuración de la base de datos
            include('config.php');

            // Consultar todos los eventos en la base de datos
            $sql = "SELECT * FROM eventoscalendar";
            $resultado = mysqli_query($con, $sql);
            
            // Verificar si se encontraron resultados
            if(mysqli_num_rows($resultado) > 0) {
                // Imprimir la tabla HTML
                echo '<table id="tablaEventos" class="display" style="width:100%">';
                echo '<thead><tr>
                <th>Foto</th>
                <th>Paciente</th>
                <th>Fecha Proxima de Cita</th>
                <th>Fecha Proxima de Pago</th>
                <th>Tratamiento</th>
                <th>Observacion</th>
                </tr></thead>';
                echo '<tbody>';
                while($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<tr>';
                    echo '<td><img src="/agenda/uploads/' . $fila['foto'] . '" alt="Foto Paciente" width="100"></td>';
                    echo '<td>' . $fila['evento'] . '</td>';
                    echo '<td>' . $fila['fecha_prox'] . '</td>';
                    echo '<td>' . $fila['fecha_pago'] . '</td>';
                    echo '<td>' . $fila['tratamiento'] . '</td>';
                    echo '<td>' . $fila['observacion'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo "No se encontraron eventos en la base de datos.";
            }
            
            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function() {
    $('#tablaEventos').DataTable();
});
</script>