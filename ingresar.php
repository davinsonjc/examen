
	<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Simple Invoice | Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- CSS  -->
   <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<style type="text/css">
	input, select, textarea{
		width: 343px;
    height: 25px;
	}
</style>
<body>
 <div class="container">
        <div class="card card-container">
            <form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Apellido</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="apellido" name="apellido" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Edad</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="edad" name="edad" required>
				  
				</div>
			  </div>
			
			  
			  <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="estudiante">Estudiante</option>
					<option value="docente">Docente</option>
				  </select>
				</div>
			  </div>

			  <div class="form-group" id="asig" style="display: none;">
				<label for="email" class="col-sm-3 control-label">Asignatura</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="asignatura" name="asignatura" >
				  
				</div>


			  </div>
			  <div class="form-group" id="gra" style="display: none;">
				<label for="email" class="col-sm-3 control-label">Grupo</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="grupo" name="grupo" >
				  
				</div>


			  </div>
			  <br>	
				<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
				<a href="index.php">Principal</a>		
		  </div>
		  
		  </form>
            </div>
        </div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#estado').change(function(){
    			if($('#estado').val()=='estudiante'){
    				$('#asig').fadeOut();
    				$('#gra').fadeIn();
    			}else{
    				$('#gra').fadeOut();
    				$('#asig').fadeIn();
    			}
    		})

    		$( "#guardar_cliente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_participante.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Guardando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
		  }
	});
  event.preventDefault();
})

    	})
    </script>
  </body>
</html>

