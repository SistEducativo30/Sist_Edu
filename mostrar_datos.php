<?php

require 'fpdf/fpdf.php';



//Verificando
$server = 'localhost';
$user = 'TelloSql';
$pass = '1234';
$db = 'carga_de_datos';

$Conectar=mysqli_connect($server,$user,$pass,$db);
if (!$Conectar) {
	echo "Error de conexion<br>";
}




// orden para  MODIFICAR 
$sql = " SELECT `dni`, `nombre`, `apellido`, `direccion`, `correo`, `localidad` FROM `usuarios` ";



// Cerrando la base de datos
$Resultado=mysqli_query($Conectar,$sql);
if (!$Resultado) {
	echo "Error al querer Mostrar";
}



$pdf = new FPDF('L','mm','A4');


$pdf ->AliasNbPages();
$pdf ->AddPage();


$pdf ->SetFillColor(232,232,232);
$pdf ->setfont('Arial', 'B', 14);


//Titulo de la tabla


$pdf ->cell(190,6,'Listado de Usuarios',1,1,'C',1);


//Cabecera de tabla


$pdf ->setfont('Arial', 'B', 10);
$pdf ->cell(30,6,'dni',1,0,'C',1);
$pdf ->cell(30,6,'nombre',1,0,'C',1);
$pdf ->cell(30,6,'apellido',1,0,'C',1);
$pdf ->cell(30,6,'direccion',1,0,'C',1);
$pdf ->cell(40,6,'correo',1,0,'C',1);
$pdf ->cell(30,6,'localidad',1,1,'C',1);




//Detalle de la tabla


$pdf ->setfont('Arial', '', 10);


while ($reg= $Resultado->fetch_assoc()) {

	$pdf ->cell(30,6,$reg["dni"],1,0,'C');
	$pdf ->cell(30,6,$reg["nombre"],1,0,'C');
	$pdf ->cell(30,6,$reg["apellido"],1,0,'C');
	$pdf ->cell(30,6,$reg["direccion"],1,0,'C');
	$pdf ->cell(40,6,$reg["correo"],1,0,'C');
	$pdf ->cell(30,6,$reg["localidad"],1,1,'C');


}


$pdf ->Output();


mysqli_close($Conectar);




?>