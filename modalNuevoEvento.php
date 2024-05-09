<div class="modal" id="exampleModal"   role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nueva Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST">	
   <div class="form-group">
			<label for="pacienteId" class="col-sm-12 control-label">Nombre del Paciente</label>
			<div class="col-sm-10">			
        <select class="form-control" id="pacienteId" name="pacienteId">
        <?php
              // Consulta para obtener los pacientes
              $query = "SELECT id, paciente FROM Pacientes";
              $result = mysqli_query($con, $query);

              // Crear opciones para la lista desplegable
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['id'] . "'>" . $row['paciente'] . "</option>";
              }
              ?>
          </select>
      </div>
		</div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha de Hoy</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_prox" class="col-sm-12 control-label">Fecha de Proxima Cita</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="fecha_prox" id="fecha_prox">
      </div>
    </div>
    <div class="form-group">
      <label for="hora_inicio" class="col-sm-12 control-label">Hora de Cita, desde:</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="hora_fin" class="col-sm-12 control-label">Hora de Cita, hasta: </label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="hora_fin" id="hora_fin">
      </div>
    </div>
    <div class="form-group">
			<label for="pago" class="col-sm-12 control-label">Pago</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="pago" id="pago"/>
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_pago" class="col-sm-12 control-label">Proxima Fecha de pago</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="fecha_pago" id="fecha_pago">
      </div>
    </div>
    <div class="form-group">
			<label for="tratamiento" class="col-sm-12 control-label">Tratamiento</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="tratamiento" id="tratamiento"/>
			</div>
		</div>
    <div class="form-group">
			<label class="col-sm-12 control-label">¿Asistio?</label>
			<div class="col-sm-12">
        <div class="form-check">
          <label class="form-check-label" for="radio1">
            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="No" checked style="display: inline">No
          </label>
        </div>
      <div class="form-check">
        <label class="form-check-label" for="radio2">
          <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Si" style="display: inline">Si
        </label>
      </div>
		</div>
    </div>

    <div class="form-group">
			<label for="observacion" class="col-sm-12 control-label">Observacion</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="observacion" id="observacion"></textarea>
			</div>
		</div>

  <div class="col-md-12" id="grupoRadio">
  
  <input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
  <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

  <input type="radio" name="color_evento" id="amber" value="#FFC107">  
  <label for="amber" class="circu" style="background-color: #FFC107;"> </label>

  <input type="radio" name="color_evento" id="lime" value="#8BC34A">  
  <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

  <input type="radio" name="color_evento" id="teal" value="#009688">  
  <label for="teal" class="circu" style="background-color: #009688;"> </label>

  <input type="radio" name="color_evento" id="blue" value="#2196F3">  
  <label for="blue" class="circu" style="background-color: #2196F3;"> </label>

  <input type="radio" name="color_evento" id="indigo" value="#9c27b0">  
  <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

</div>
		
	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Guardar Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>

    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#formEvento').submit(function(event) {

          // Obtener los valores de las fechas
          var fechaInicioStr = $('#fecha_inicio').val();
          var fechaProxStr = $('#fecha_prox').val();
          var fechaPagoStr = $('#fecha_pago').val();

          // Separar la fecha en día, mes y año
          var partes_fecha = fechaInicioStr.split("-");
          var dia = partes_fecha[0];
          var mes = partes_fecha[1];
          var año = partes_fecha[2];

          // Crear una nueva fecha en formato yyyy-mm-dd
          var fechaInicio2 = año + "-" + mes + "-" + dia;
            
          // Convertir las fechas a objetos Date
          var fechaInicio = new Date(fechaInicio2);
          var fechaProx = new Date(fechaProxStr);
          var fechaPago = new Date(fechaPagoStr);

          // Verificar si las fechas son válidas
          if (isNaN(fechaInicio.getTime()) || isNaN(fechaProx.getTime()) || isNaN(fechaPago.getTime())) {
            alert('Una o más fechas son inválidas.');
            event.preventDefault();
            return;
          }

          // Comparar las fechas
          if (fechaInicio >= fechaProx || fechaInicio >= fechaPago) {
            alert('La fecha de inicio debe ser menor que la fecha de próxima cita y la fecha de próximo pago.');
            event.preventDefault();
          }
        });
    });
</script>

<script>
$(document).ready(function() {
  $('#formEvento').submit(function(event) {

    var horaInicio = document.getElementById("hora_inicio").value;
    var horaFin = document.getElementById("hora_fin").value;
    console.log(horaInicio);
    console.log(horaFin);
    if (horaInicio >= horaFin) {
        alert("La hora de fin debe ser posterior a la hora de inicio.");
        event.preventDefault();
    }

  });
    });
</script>