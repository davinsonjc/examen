<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?><?php
$tpd=$_GET['tpd'];
$tpe=$_GET['tpe'];
$est=$_GET['est'];
$doc=$_GET['doc'];

if($tpe>$tpd){
$sql="SELECT * FROM estudiante, participante WHERE estudiante.aleatorio_participante='$est' AND participante.numeroaleatorio='$est'";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
echo '<h1> NOMBRE: '.$row['nombre'].' APELLIDO: '.$row['apellido'].' EDAD:'. $row['edad'].'  GRUPO: '.$row['grupo'].'  NUMERO ALEATORIO: '.$row['numeroaleatorio'].'</h1>';
}else if($tpd>$tpe){
echo $tpd;
$sql="SELECT * FROM docente, participante WHERE docente.aleatorio_participante='$doc' AND participante.numeroaleatorio='$doc'";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
echo '<h1> NOMBRE: '.$row['nombre'].' APELLIDO: '.$row['apellido'].' EDAD:'. $row['edad'].'  ASIGNATURA: '.$row['asignatura']. ' NUMERO ALEATORIO '.$row['numeroaleatorio'].'</h1>';
	}else{
 echo '<h1>los datos son iguales<h1>';
	}
 ?>

