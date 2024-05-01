<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agenda Sader</title>
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">

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


<?php
include('config.php');

  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

?>
<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 mb-3">
    <h3 class="text-center" id="title">Calendario de Citas</h3>
  </div>
  </div>

</div>


<!-- Suprimir el botón Lista de Pacientes -->
<style>
    #listarEventoss {
        display: none; /* Oculta el botón */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <button id="listarEventoss" class="btn btn-primary">Lista de Pacientes</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener el botón por su ID
    var boton = document.getElementById('listarEventoss');

    // Agregar un evento de clic al botón
    boton.addEventListener('click', function() {
        // Redireccionar a la nueva página
        window.location.href = 'mostrar_eventos.php';
    });
});
</script>

<div id="calendar"></div>

<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>

<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',
    timezone: 'local',
    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
      
      var horaInicio = start.format('HH:mm');
      var horaFin = end.format('HH:mm');
  
      $("input[name=hora_inicio]").val(horaInicio);
      $("input[name=hora_fin]").val(horaFin);
    },
      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
          {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          fecha_prox: '<?php echo $dataEvento['fecha_prox']; ?>',
          end:  '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'  
        },
        <?php } ?>
    ],

//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    // Agregar informacion al título del evento
    element.find(".fc-title").append(" - Proxima fecha de pago: " + event.fecha_prox);
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    console.log("Se hizo clic en el evento:", event.title);
    /*$('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.timestamp);
    $('input[name=fecha_prox').val(event.fecha_prox);
    $('input[name=fecha_pago').val(event.fecha_pago);
    $('input[name=fecha_fin').val(event.timestamp2);
    $('input[name=pago').val(event.pago);
    $('input[name=tratamiento').val(event.tratamiento);
    $('input[name=observacion').val(event.observacion);
    $('input[name=asistio').val(event.asistio);
    $('input[name=foto').val(event.nombreImagenEscapado);
    */
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    //$('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    //$('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));
    //$("#modalPrueba").modal();
    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>

</body>
</html>
