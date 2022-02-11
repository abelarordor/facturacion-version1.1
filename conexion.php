<?php
$host='localhost';
$user='root';
$paswoord='1998';
$db='facturacion';
$conection= @mysqli_connect($host,$user,$paswoord,$db);
if (!$conection) {
    echo"error en la coneccion";
    
}else{
echo"conexion correcta";
}
?>
