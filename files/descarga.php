<?php
	//error_reporting(E_ALL);
 	//ini_set("display_errors", 1);
	include "con.php";
	$idarchivo=mataInjection($_GET['a']);
	$ruta="";
	$sql="SELECT * from fichero where id = '".$idarchivo."'";

	$respuesta = mysql_query($sql);

	while($row = mysql_fetch_array($respuesta)){
		$nombre=utf8_encode($row['nombre']);
		$ruta=$row['ruta'];
	}
if(isset($_POST['empresa'])){
	$uEmail=0;
	$uTelefono=0;
	$idarchivo=$_POST['idarchivo'];
	$sql="SELECT * from fichero where id = '".$idarchivo."'";

	$respuesta = mysql_query($sql);

	while($row = mysql_fetch_array($respuesta)){
		$ruta=$row['ruta'];
	}
	$uNombre=mataInjection($_POST['nombre']);
	$uApellido=mataInjection($_POST['apellido']);
	$uEmpresa=mataInjection($_POST['empresa']);
	$uEmail=mataInjection($_POST['email']);
	$uTelefono=mataInjection($_POST['telefono']);

mysql_query("INSERT into usuario (Nombre,Apellido,Telefono,Empresa,id_fichero,email,fecha_hora) values ('$uNombre','$uApellido','$uTelefono','$uEmpresa','$idarchivo','$uEmail',now())");

header("location: ".$ruta);
}
if($ruta!=''){;
?>
<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Descarga de Archivos</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="validador.js"></script>
</head>
<body>

	<center>
		<div style="width:480px;">
<h2>Regístrese para descargar <?=$nombre?>:</h2></div>
<form id="form" action="descarga.php" method="post">
	<table id="tabla">
		<tr>
			<td class="leyenda">Nombre:</td>
			<td><input type="text" name="nombre" id="nombre" class="texto ob"></td>
		</tr>
		<tr>
			<td class="leyenda">Apellido:</td>
			<td><input type="text" name="apellido" id="apellido" class="texto ob"></td>
		</tr>
		<tr>
			<td class="leyenda">Empresa:</td>
			<td><input type="text" name="empresa" id="empresa" class="texto ob"></td>
		</tr>
		<tr>
			<td class="leyenda">Email:</td>
			<td><input type="text" name="email" id="email" class="texto ob"></td>
		</tr>
		<tr>
			<td class="leyenda">Teléfono:</td>
			<td><input type="text" name="telefono" id="telefono" class="texto"></td>
		</tr>
		</table>
	<div id="error" class="error">Ingrese los datos solicitados.</div>
	<input type="hidden" value="<?=$idarchivo?>" name="idarchivo">
	<input type="submit" value="Descargar" class="boton">
</form></center>


</body>

</html>
<?php
}
else{
	echo utf8_decode("<br><br><br>
	<center><font color ='red' size='16'>Archivo inválido.</font></center>");
}
?>