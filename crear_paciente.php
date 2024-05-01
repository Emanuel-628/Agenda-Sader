<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pacientes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
        <li class="nav-item"><a href="crear_paciente.php" class="nav-link">Crear Paciente</a></li>
        <li class="nav-item"><a href="mostrar_eventos.php" class="nav-link">Lista de Pacientes</a></li>
        </ul>
    </div>
    </nav>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h3 class="text-center mb-4 custom-heading">Crear Paciente</h2>
      <form action="guardarPaciente.php" method="post">
        <div class="mb-3">
          <label for="pacienteId" class="form-label">Nombre del Paciente</label>
          <input type="text" class="form-control" id="pacienteId" name="pacienteId">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>

</body>
</html>
