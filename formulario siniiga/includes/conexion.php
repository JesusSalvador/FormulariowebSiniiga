<?php

//mysql_query("SET NAMES 'utf8'"); //para que la base de datos reconozca acentos y las ñ
$servername = "localhost";
$username = "jesussalvadorval";
$password = "";
$dbname = "siniiga";

$conexion= mysqli_connect($servername,$username,$password,$dbname);
/*if (!$conexion){
    echo 'Error al conectar a la base de datos';
}
else{
    echo 'Conexión correcta a la base de datos';
}*/
header("Content-Type: text/html;charset=utf-8");
?>