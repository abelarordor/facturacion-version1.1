<?php
session_start();
include "../conexion.php";


if (!empty($_POST)) {
    $total = $_POST['total'];
    $datos = (unserialize(base64_decode($_POST['result'])) );

    $fechaorden;

//$array = unserialize($_POST['array[]']);
//print_r($array);
$idSesion =  $_SESSION['idUser'];
$query_insert=mysqli_query($conection,"INSERT INTO orden(idusuario,total)VALUES($idSesion,$total)");

$selecquery=mysqli_query($conection,"SELECT o.idorden FROM orden o INNER JOIN orden_detalle od on o.idorden=od.idorden WHERE o.idusuario=$idSesion");
$data=mysqli_fetch_array($selecquery);
$iddorden=$data['idorden'];

foreach($datos as $key=>$value) {
    echo 'indice es '.$key.' y el valor es '.$value;
    
    $query_insert2=mysqli_query($conection,"INSERT INTO orden_detalle(idorden,idproducto)VALUES($iddorden,$value)");
}
//for ($i=0; $i <= count($datos); $i++) {
  //print_r($datos[$i]);
// $idproducto=$array[$i];
 //
//}

}else{
    if ($query_insert) {  

        $alert='<p class="msg_save">Usuario creado correctamente</p>';
       
        
                     # code...
}else{
    $alert='<p class="msg_error">Usuario no pudo ser creado correctamente</p>';
}
}




?>
