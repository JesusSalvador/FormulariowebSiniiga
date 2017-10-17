<?php

include "conexion.php";
mysql_query("SET NAMES 'utf8'");//para que la base de datos reconozca acentos y las ñ
header("Content-Type: text/html;charset=utf-8"); //para agregar acentos y ñ en caso de que el anterior falle

//recibir y almacenar en variables
$claveupp= $_POST["claveupp"];
$nombreproductor= $_POST["nombreproductor"];
$nombrepredio=$_POST["nombrepredio"];
$nombretecnico=$_POST["nombretecnico"];
$seriedel=$_POST["seriedel"];
$al=$_POST["al"];
$totalpaq=$_POST["totalpaq"];
$fechaaretado=$_POST["fechaaretado"];
$numerosiniiga=$_POST["numerosiniiga"];
$aretecamp=$_POST["aretecamp"];
$fechanac=$_POST["fechanac"];
$sexo=$_POST["sexo"];
$raza=$_POST["raza"];
$especifraza=$_POST["especifraza"];
$empadre=$_POST["empadre"];
$padre=$_POST["padre"];
$madre=$_POST["madre"];

//sentencia para insertar datos
$insertar = "INSERT INTO registros VALUES ('','$claveupp','$nombreproductor','$nombrepredio','$nombretecnico','$seriedel','$al','$totalpaq','$fechaaretado','$numerosiniiga','$aretecamp','$fechanac','$sexo','$raza','$especifraza','$empadre','$padre','$madre')" ; 

$verificar_nosiniiga = mysqli_query($conexion,"SELECT * FROM registros WHERE numero_siniiga = '$numerosiniiga'");
/*if(!$result){
  echo mysqli_error($conexion);
}*/
if (mysqli_num_rows ($verificar_nosiniiga) > 0){
    echo '<script>
           alert("El número de Siniiga ya se encuentra registrado, ingrese uno diferente");
           window.history.go(-1);
         </script>';
    exit;
}

//ejecutar consulta
$resultado = mysqli_query($conexion,$insertar);
if(!$resultado){
    echo '<script>
            alert("Error al registrarse");
            window.history.go(-1);
        </script>';   
}else{   
   echo '<script>
            alert("Los datos se han registrados exitosamente");
            window.history.go(-1);
        </script>';
}
//cerar conexión
mysqli_close($conexion);

?>