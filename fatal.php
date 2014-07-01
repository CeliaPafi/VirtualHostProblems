<html>
 <head>
  <title></title>
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
	frm_usuarios.Dni.focus();
   }
   
   function validate() {
	if (frm_usuarios.Dni.value == '') {		
		alert('Ingrese su DNI.');
		frm_usuarios.Dni.focus();
		return false;
	}
	if (frm_usuarios.Paterno.value == '') {		
		alert('Ingrese su apellido Paterno.');
		frm_usuarios.Paterno.focus();
		return false;
	}
	if (frm_usuarios.Materno.value == '') {		
		alert('Ingrese su Apellido Materno.');
		frm_usuarios.Materno.focus();
		return false;
	}
	if (frm_usuarios.Nombres.value == '') {		
		alert('Ingrese sus nombres.');
		frm_usuarios.Nombres.focus();
		return false;
	}
	if (frm_usuarios.Direccion.value == '') {		
		alert('Campo Direccion es requerido.');
		frm_usuarios.Direccion.focus();
		return false;
	}
	if (frm_usuarios.Telefono.value == '') {		
		alert('Campo Telefono es requerido.');
		frm_usuarios.Telefono.focus();
		return false;
	}
	if (frm_usuarios.Ruc.value == '') {		
		alert('Campo Ruc es requerido.');
		frm_usuarios.Ruc.focus();
		return false;
	}
	
	if (isNaN(frm_usuarios.Dni.value)) {
		alert('Ingrese sólo números para este campo.');
		frm_usuarios.Dni.select();
		return false;
	}
	if (isNaN(frm_usuarios.Telefono.value)) {
		alert('Ingrese sólo números para este campo.');
		frm_usuarios.Telefono.select();
		return false;
	}
	if (isNaN(frm_usuarios.Ruc.value)) {
		alert('Ingrese sólo números para este campo.');
		frm_usuarios.Ruc.select();
		return false;
	}

	return true;
   }
  </script>
 </head>
 <body onLoad="onFocus()">
 <fieldset>                                                                   
  <legend> REGISTRO DE USUARIOS</legend>
  <form name="frm_usuarios" method="post" action="fatal.php" onSubmit="return validate()">
  	<table>
  		<tr >
		<td class="cabecera" bgcolor="#336000">Dni:&nbsp;&nbsp;</td><td class="detalle"><input type="text" size="8" maxlength="8" name="Dni"> </td>				
		</tr>
		<tr>
		<td class="cabecera" bgcolor="#336000">Apellido Paterno:&nbsp;&nbsp;</td> <td class="detalle"><input type="text" size="30" name="Paterno"> </td>
		</tr>
		<tr>
		<td class="cabecera" bgcolor="#336000">Apellido Materno:&nbsp;&nbsp;</td><td class="detalle"> <input type="text" size="30" name="Materno"></td>
		<tr>
		<td class="cabecera" bgcolor="#336000">Nombres:&nbsp;&nbsp;</td><td class="detalle"> <input type="text" size="30" name="Nombres"></td>
		</tr>
		<tr>
		<td class="cabecera" bgcolor="#336000">Direccion:&nbsp;&nbsp;</td><td class="detalle"> <input type="text" size="40" name="Direccion"></td>
		</tr>
		<tr>
		<td class="cabecera" bgcolor="#336000">Telefono:&nbsp;&nbsp;</td><td class="detalle"> <input type="text" size="10" name="Telefono"></td>
		</tr>
		<tr>
		<td class="cabecera" bgcolor="#336000">Ruc:&nbsp;&nbsp;</td><td class="detalle"> <input type="text" size="15" maxlength="11" name="Ruc"></td>
		</tr>
		<tr align="center" class="detalle">
		<td colspan="2"><input type="submit" size="20" value="REGISTRAR"><a href="busqueda.php" cmd="edit1"><img src="edit1.png" alt="" border="1"></a></td>
		</tr>
		<tr align="center">
		<td colspan="2"><input type="hidden" name="seguro" value="12345"></td>
		</tr>
  	</table>
  	<fieldset> 
    </form>
    <?php
	if (isset($_POST["seguro"])) {
			//var n=parseInt(form.txtnumero.value);
			$Dni=$_POST["Dni"];
			$Paterno=$_POST["Paterno"];
			$Materno=$_POST["Materno"];
			$Nombres=$_POST["Nombres"];
			$Direccion=$_POST["Direccion"];
			$Telefono=$_POST["Telefono"];
			$Ruc=$_POST["Ruc"];
		
				
					$bd = new SQLite3("gisela.db");
					$bd->query("INSERT INTO Datos values ('$Dni','$Paterno','$Materno','$Nombres','$Direccion','$Telefono','$Ruc')" );
					$bd->close();
				
			
	}
?>
 </body>
</html>