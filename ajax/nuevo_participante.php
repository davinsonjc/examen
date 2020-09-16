<?php
	if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['nombre'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$edad=mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));
		$aleatorio=rand(0, 15498558885);
		
		$estado=$_POST['estado'];
		if($estado=='estudiante'){
			$grupo=mysqli_real_escape_string($con,(strip_tags($_POST["grupo"],ENT_QUOTES)));
		}else{
			$asignatura=mysqli_real_escape_string($con,(strip_tags($_POST["asignatura"],ENT_QUOTES)));
		}
		$sql="INSERT INTO participante (nombre, apellido, edad, numeroaleatorio) VALUES ('$nombre','$apellido','$edad','$aleatorio')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				if($estado=='estudiante'){
					$sql2="INSERT INTO estudiante (grupo, aleatorio_participante) VALUES ('$grupo','$aleatorio')";
		$query_new_insert2 = mysqli_query($con,$sql2);
	}else{
		$sql3="INSERT INTO docente (asignatura, aleatorio_participante) VALUES ('$asignatura','$aleatorio')";
		$query_new_insert3 = mysqli_query($con,$sql3);

				}
				$messages[] = "El participante ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>