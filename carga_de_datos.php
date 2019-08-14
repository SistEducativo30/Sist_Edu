<?php
$dni = $_POST ['dni'];
$nombre = $_POST ['nombre'];
$apellido = $_POST ['apellido'];
$direccion = $_POST ['direccion'];
$correo = $_POST ['correo'];
$localidad = $_POST ['localidad'];

$server = 'localhost';
$user = 'HOLAAAAAAAAAAAAAAAAAAAAAAAAAAA';
$pass = '1234';
$db = 'carga_de_datos';

//Crear conexion a la base
$conn = mysqli_connect($server, $user, $pass, $db);
//Checkear 
if (!$conn){
    die("coneccion failed: ".mysqli_connect_error());
}
echo "Conectado";

//Insertar
$sql = "INSERT INTO `usuarios`(`dni`, `nombre`, `apellido`, `direccion`, `correo`, `localidad`) VALUES ('$dni', '$nombre', '$apellido', '$direccion', '$correo', '$localidad')";
//Check de Insercion
if(mysqli_query($conn, $sql)){
    echo "Insertado correctamente";
}else{
    echo "Error: ".$sql. "<br>".mysqli_error($conn);
}









?>