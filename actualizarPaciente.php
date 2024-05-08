<?php
// Incluir el archivo de configuración de la base de datos
include('config.php');

// Verificar si se recibieron los datos del formulario de edición
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['paciente'];

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


    // Consultar la base de datos para actualizar el registro del paciente
    $query = "UPDATE Pacientes SET paciente = '$nombre', foto = '$nombreImagenEscapado' WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Verificar si la consulta se ejecutó correctamente
    if($result) {
        // Redirigir de vuelta a la lista de pacientes con un mensaje de éxito
        header("Location: mostrarPacientes.php?success=1");
        exit();
    } else {
        // Si hay algún error, mostrar un mensaje de error y redirigir de vuelta al formulario de edición
        echo "Error al actualizar el paciente. Por favor, intenta nuevamente.";
        header("Location: editarPaciente.php?id=$id&error=1");
        exit();
    }
} else {
    // Si no se recibieron los datos del formulario, redirigir a alguna página de error o al inicio
    header("Location: index.php");
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
