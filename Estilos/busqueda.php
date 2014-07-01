<?php
	$nombreDB = 'gisela.db';
	$db = new SQLite3($nombreDB);
	
	if (isset($_POST["txt_dni"]) == '') {
		$filtro = 0;
	}
	
	else {
		$dni = $_POST["txt_dni"];
		$filtro = 1;
	}
		
	$sql = "select * from Datos";
	
	if ($filtro == 1) {
		$sql .= " where Dni_Personal = '$dni'";
	}
	
	$result = $db->query($sql);
?>
<html>
 <head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <title>B&Uacute;SQUEDA EN PHP</title>
  <style>
	.cabecera {
		font-family: Arial;
		font-size: 12px;
		color: #FFF;
		font-weight: bold;
	}
	.detalle {
		font-family: Calibri;
		font-size: 12px;
		color: #000;
	}
  </style>
  <script language="javascript">
  
  
	function onFocus() {
		frm_busqueda.txt_dni.focus();
	}
		
	function validar() {
		if (frm_busqueda.txt_dni.value == '') {
			alert('Ingrese un parámetro para la búsqueda.');
			frm_busqueda.txt_dni.focus();
			return false;
		}
		
		if (isNaN(frm_busqueda.txt_dni.value)) {
			alert('El campo sólo admite caracteres numéricos.');
			frm_busqueda.txt_dni.select();
			return false;
		}
		
		return true;
	}
  </script>
 </head>
 <body onLoad="onFocus()">
  <p>
   <form name="frm_busqueda" action="busqueda.php" method="post" onSubmit="return validar()">
    <b>Ingrese DNI:</b>&nbsp;<input type="text" maxlength="8" name="txt_dni">&nbsp;<input type="submit" name="btn_procesar" value="Buscar">
   </form>
  <p>
  <table cellspacing="1" cellpadding="0" border="4" width="100%">
   <tr class="cabecera" bgcolor="#336000">
    <td>&nbsp;DNI</td>
	<td>&nbsp;APELLIDO PATERNO</td>
	<td>&nbsp;APELLIDO MATERNO</td>
	<td>&nbsp;NOMBRES</td>
	<td>&nbsp;DIRECCI&Oacute;N</td>
	<td>&nbsp;TEL&Eacute;FONO</td>
	<td>&nbsp;RUC</td>
	<td>&nbsp;</td>
   </tr>
   <?php
	while ($row = $result->fetchArray()) {
	?>
	<tr class="detalle">
	 <td><?php echo $row['Dni_Personal']; ?></td>
	 <td><?php echo $row['Paterno']; ?></td>
	 <td><?php echo $row['Materno']; ?></td>
	 <td><?php echo $row['Nombres']; ?></td>
	 <td><?php echo $row['Direccion']; ?></td>
	 <td><?php echo $row['Telefono']; ?></td>
	 <td><?php echo $row['Ruc']; ?></td>
	 <td><a href="datos.php?dni=<?php echo $row['Dni_Personal']; ?>&cmd=edit1"><img src="edit1.png" alt="" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="confirmar.php?dni=<?php echo $row['Dni_Personal']; ?>&cmd=delete1"><img src="delete1.png" alt="" border="0"></a></td>	 
	</tr>
	<?php
	}
	
	$db->close();
   ?>
  </table>
 </body>
</html>1