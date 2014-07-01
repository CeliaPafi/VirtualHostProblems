<?php

 $comando = $_GET['cmd'];
  $dni = $_GET['dni'];
  echo  "El Dni :".$dni." Fue Eliminado Correctamente ..!! ";

	$nombreDB = 'gisela.db';
	$db = new SQLite3($nombreDB);	
		
	$sql = "delete from Datos where Dni_Personal = '$dni.'";	
	$result = $db->query($sql);
	$db->close();
	echo "<br>";
	echo "<a href='busqueda.php'>Busqueda</a>";
	//echo "la consulta  ".$sql;
	//header("location:busqueda.php");

?>