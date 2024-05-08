<?php
// Incluir el archivo de configuración de la base de datos
include('config.php');

// Verificar si se recibió el ID del paciente a editar
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del paciente desde la URL
    $id = $_GET['id'];
    
    // Consultar la base de datos para obtener los detalles del paciente
    $query = "SELECT * FROM Pacientes WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Verificar si se encontraron resultados
    if(mysqli_num_rows($result) > 0) {
        // Obtener los detalles del paciente
        $paciente = mysqli_fetch_assoc($result);
        // Mostrar el formulario de edición prellenado con los detalles del paciente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="icon" type="image/jpg" href="/agenda/sader.jpg">

    <style>
    .custom-heading {
        color: #d7dbd7;
        font-weight: 800;
        border-bottom: 3px solid rgb(240, 237, 236);
        background: #2f6df4;
        padding: 8px 30px;
        text-align: center;
    }
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="index.php" class="navbar-brand">Sader</a>
        <ul class="navbar-nav">
        <li class="nav-item"><a href="mostrar_eventos.php" class="nav-link">Historial de Pacientes</a></li>
        <li class="nav-item"><a href="crear_paciente.php" class="nav-link">Crear Paciente</a></li>
        <li class="nav-item"><a href="mostrarPacientes.php" class="nav-link">Lista de Pacientes</a></li>    
    </ul>
    </div>
</nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mx-auto">
            <h3 class="text-center mb-4 custom-heading">Editar Paciente</h3>
            <form action="actualizarPaciente.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
                <div class="mb-3">
                    <label for="paciente">Nombre del Paciente:</label>
                    <input type="text" class="form-control" id="paciente" name="paciente" value="<?php echo $paciente['paciente']; ?>">
                </div>
                <div class = "mb-3">
                    <label for = "foto">  Foto </label>
                    <input type ="file" class="form-control-file" name="foto" id ="foto" value="<?php echo $paciente['foto']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
    } else {
        echo "No se encontró ningún paciente con el ID especificado.";
    }
} else {
    echo "No se especificó ningún ID de paciente para editar.";
}
// Cerrar la conexión a la base de datos
mysqli_close($con);
?>

