<?php
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
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
	body{
		padding: 50px;
		background: #0c82e8;
	}
	select{
		width: 345px;
    height: 37px;
    font-size: 15px;
	}
	.t{
		margin-left: 155px;
    font-size: 29px;
    height: 71px;
    width: 112px;
    border-radius: 60px;
    background: rgb(41, 226, 87);
    color: #fff;

	}

	.tab{
		width: 150px;
    border: 1px solid #000;
    text-align: center;
    font-size: 113px;
    color: #fff;
    background: #000;
    border-radius: 15px;
    margin-left: 134PX;
    margin-top: 25px;
	}
	.vs{
		border-radius: 50px;
    width: 100px;
    height: 50px;
    text-align: center;
    font-size: 158px;
    margin-left: 505px;
    margin-top: 166px;
    position: absolute;
    color: orange;
    text-shadow: 7px 5px #000;
	}
</style>
<body>
 <div class="container">
 	<table>
 		<tr>
 		<td><div class="card card-container">
 			<select id="docente">
 				<option value="">Docente</option>
 				<?php 
 				$sql="SELECT * FROM docente";
		$query = mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($query)){
						$random=$row['aleatorio_participante'];

		$sql4="SELECT * FROM participante WHERE numeroaleatorio='$random'";
		$query4 = mysqli_query($con, $sql4);
		while ($row4=mysqli_fetch_array($query4)){
			$nombre=$row4['nombre'].' '.$row4['apellido'];
						?>

						<option value="<?php echo $random; ?>"><?php echo $nombre; ?></option>
					<?php }
				}?>

 			</select>
 		</div>
 		<button class="t" id="d_turn" disabled>Turno</button>
 		<div class="tab"><span id="td">5</span></div>
 	</td>
<div class="vs">VS</div>
<a style="text-decoration: none;
    font-size: 25px;
    height: 45px;
    width: 40px;
    background: #673AB7;
    padding: 12px;
    color: #fff;
    border-radius: 22px;" href="ingresar.php">Añadir participante</a>
    <a style="text-decoration: none;
    font-size: 25px;
    height: 45px;
    width: 40px;
    background: #673AB7;
    padding: 12px;
    color: #fff;
    border-radius: 22px;" href="#" id="puntaje">puntaje</a>
 			<td style="width: 350px;">	</td>
 		<td><div class="card card-container">
 			<select id="estudiante">
 				<option value=" ">Estudiante</option>
 				<?php 
 				$sql="SELECT * FROM estudiante";
		$query = mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($query)){
						$random6=$row['aleatorio_participante'];

		$sql5="SELECT * FROM participante WHERE numeroaleatorio='$random6'";
		$query5 = mysqli_query($con, $sql5);
		while ($row5=mysqli_fetch_array($query5)){
			$nombre5=$row5['nombre'].' '.$row5['apellido'];
						?>

						<option value="<?php echo $random6; ?>"><?php echo $nombre5; ?></option>
					<?php }
				}?>
 			</select>
 		</div>
 		<input type="hidden" value="" id="tpd">
 		<input type="hidden" value="" id="tpe">
 	<button class="t" id="e_turn" disabled>Turno</button>
 	<div class="tab"><span id="te">5</span></div>
 </td>
 		</tr>
 	</table>
      <div class="resultado"></div>
    </div><!-- /container -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript">
    	$(document).ready(function(){
    		$('#docente').change(function(){
    			if($('#docente').val()!=' '){
    				$('#d_turn').attr("disabled", false);
    			}else{
    				$('#d_turn').attr("disabled", true);
    			}
    		})

    		$('#estudiante').change(function(){
    			if($('#estudiante').val()!=' '){
    				$('#e_turn').attr("disabled", false);
    			}else{
    				$('#e_turn').attr("disabled", true);
    			}
    		})

    		$('#d_turn').click(function(){
    			$.get('ajax/aleatorio.php',function(data){
    				$('#tpd').val(data);
    				$('#td').html(data);
    				
    			});

    			$('#d_turn').attr("disabled", true);

    		})

    		$('#e_turn').click(function(){
    			$.get('ajax/aleatorio.php',function(data){
    				$('#tpe').val(data);
    				$('#te').html(data);
    				
    			});
    			$('#e_turn').attr("disabled", true);

    			
    		})

    		$('#puntaje').click(function(){
    			 $tpd=$('#tpd').val();
    			 $tpe=$('#tpe').val();
    			 $est=$('#estudiante').val();
    			 $doc=$('#docente').val();
    			 $.get('ajax/puntaje.php',{'tpd':$tpd, 'tpe':$tpe, 'est':$est, 'doc':$doc}, function(data){
    			 	$('.resultado').html(data);
    			 })
    			
    		})
})
</script>
  </body>
</html>

			