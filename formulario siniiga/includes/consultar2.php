<?php

$mysqli = new mysqli("localhost","jesussalvadorval","","siniiga");
//mysql_query("SET NAMES 'utf8'");//para que la base de datos reconozca acentos y las ñ
header("Content-Type: text/html;charset=utf-8"); //para agregar acentos y ñ en caso de que el anterior falle

$salida="";
$query="SELECT * FROM registros";

if (isset($_POST['consulta'])){
    $q= $mysqli-> real_escape_string($_POST['consulta']);
    $query= "SELECT * FROM registros WHERE clave_upp LIKE '%".$q."%' OR nombre_prod LIKE '%".$q."%' OR nombre_predio LIKE '%".$q."%'
    OR nom_tecnico LIKE '%".$q."%' OR serie_del LIKE '%".$q."%' OR al LIKE '%".$q."%' OR fecha_aretado LIKE '%".$q."%' OR numero_siniiga LIKE '%".$q."%'
    OR arete_camp LIKE '%".$q."%' OR fecha_nac LIKE '%".$q."%' OR sexo LIKE '%".$q."%' OR raza LIKE '%".$q."%' OR espec_raza LIKE '%".$q."%'
    OR empadre LIKE '%".$q."%' OR raza_num_padre LIKE '%".$q."%' OR raza_num_madre LIKE '%".$q."%'";
}

$resultado=$mysqli-> query($query);

if($resultado->num_rows>0){
    $salida.= "<table class='table table-bordered'>
        <thead>
        <tr><td>Operaciones</td><td>Clave UPP</td><td>Nombre del productor</td><td>Nombre del predio</td><td>Nombre del técnico</td><td>Serie del</td><td>Al</td>
        <td>Total de paquetes</td><td>Fecha aretado</td><td>Número siniiga</td><td>Arete campaña</td><td>Fecha de nacimiento</td><td>Sexo</td><td>Raza</td>
        <td>Especificar Raza</td><td>Empadre</td><td>Raza o número siniiga del padre</td><td>Raza o número siniiga de la madre</td> </tr><tr>
        </thead>
        <tbody>";
        
        while($fila=$resultado->fetch_assoc()){
            $salida.="<tr>
                <td>".$fila['ID']."</td>
                <td>".$fila['clave_upp']."</td><td>".$fila['nombre_prod']."</td><td>".$fila['nombre_predio']."</td><td>".$fila['nom_tecnico']."</td><td>".$fila['serie_del']."</td><td>".$fila['al']."</td><td>".$fila['total_paq']."</td><td>"
                .$fila['fecha_aretado']."</td><td>".$fila['numero_siniiga']."</td><td>".$fila['arete_camp']."</td><td>".$fila['fecha_nac']."</td><td>".$fila['sexo']."</td><td>".$fila['raza']."</td><td>".$fila['espec_raza']."</td>
                <td>".$fila['empadre']."</td><td>".$fila['raza_num_padre']."</td><td>".$fila['raza_num_madre']."</td>
                </tr>";
        }
        $salida.="</tbody></table>";
}else{ 
    $salida.="<div class='control-label col-sm-4'>No se encontraron datos</div>";
}
echo $salida;
$mysqli->close();
/*
$numerosiniiga=$_POST["numerosiniiga"];

$consultar = "SELECT * FROM registros WHERE numero_siniiga = '$numerosiniiga'";

$verificar_nosiniiga = mysqli_query($conexion,"SELECT * FROM registros WHERE numero_siniiga = '$numerosiniiga'");

if(mysqli_num_rows($verificar_nosiniiga)<1){
    echo '<script>
           alert("El dato ingresado no se encuentra en la base de datos");
           window.history.go(-1);
         </script>';
    exit;
}

$resultado = mysqli_query($conexion,$consultar);
if(!$resultado){
    echo '<script>
            alert("Error al realizar consulta, intente de nuevo");
            window.history.go(-1);
        </script>';
}else{
     echo '<table border="1" ><tr><td>Clave UPP</td><td>Nombre del productor</td><td>Nombre del predio</td><td>Nombre del técnico</td><td>Serie del</td><td>Al</td>
        <td>Total de paquetes</td><td>Fecha aretado</td><td>Número siniiga</td><td>Arete campaña</td><td>Fecha de nacimiento</td><td>Sexo</td><td>Raza</td>
        <td>Especificar Raza</td><td>Empadre</td><td>Raza o número siniiga del padre</td><td>Raza o número siniiga de la madre</td> </tr><tr>';
         
         while ($row = mysqli_fetch_row ($resultado)){
             echo '<td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'
                .$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td><td>'.$row[12].'</td><td>'.$row[13].'</td><td>'.$row[14].'</td><td>'.$row[15].'</td><td>'.$row[16].'</td><td>'.$row[17].'</td><tr>';
   }
   echo '</tr></table>';
}
//cerar conexión
mysqli_close($conexion);
*/
?>