<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nueva Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Nombre del Paciente</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="evento" id="evento" />
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="hora_inicio" class="col-sm-12 control-label">Hora Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="hora_inicio" id="hora_inicio" >
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_fin" class="col-sm-12 control-label">Fecha Proxima</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
      </div>
    </div>
    <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Pago</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="pago" id="pago"/>
			</div>
		</div>
    <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Tratamiento</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="tratamiento" id="tratamiento"/>
			</div>
		</div>
    <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Observacion</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="observacion" id="observacion"/>
			</div>
		</div>

    <div class = "form-group">
      <label for = "Foto">Foto: </label>
        <input type ="file" class="form-control" name="foto" id ="foto">
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

<script>
document.getElementById("formEvento").addEventListener("submit", function(event) {
    var fechaInicio = new Date(document.getElementById("fecha_inicio").value);
    var fechaFin = new Date(document.getElementById("fecha_fin").value);

    if (fechaFin < fechaInicio) {
        alert("La fecha de fin debe ser posterior o igual a la fecha de inicio.");
        event.preventDefault(); // Evita que el formulario se envíe si la validación falla
    }
});
</script>