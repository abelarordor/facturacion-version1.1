<?php
session_start();
if ($_SESSION['rol'] != 1 and  $_SESSION['rol']!=2) {

    header("location: ./");
}
include"../conexion.php";
$resultado=null;

if (!empty($_POST)) {
    $alert='';
   

    if (empty($_POST['proveedor'])||empty($_POST['contacto'])||empty($_POST['telefono'])||empty(
        $_POST['direccion'])||empty($_POST['rol'])){
      $alert='<p class="msg_error">llne tofdo</p>';
    }else{
        $proveedor= $_POST['proveedor'];
        $contacto= $_POST['contacto'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $usuario_id=$_SESSION['isUser'];
        $result=0;
        $query_insert=mysqli_query($conection,"INSERT INTO usuario(proveedor,contacto,telefono,direccion,usuario_id)
        VALUES('$proveedor','$contacto','$telefono','$direccion','$usuario_id')");

        if($query_insert){
        $alert("correcta");
        }else{
        $alert("incorrecto");
        }
        
    


   
     
        

      
        



        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <?php include 'includes/scripts.php';?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Registrar Uruario</title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
    <div class=".header">
    <?php include 'includes/header.php';?>
    </div>
    <section id="container">
        <div class="form_register">
            <h1>
                Registro usuario
            </h1>
            <hr>
            <div class="alert"> <?php echo isset($alert) ? $alert: ''; ?></div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nombre">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor"   placeholder="Nombre completo?" required>
                <label for="correo">Comtacto</label>
                <input type="text" name="contacto" id="contacto" placeholder="Correo electronico"  required>
                <label for="usuario">Telefoo</label>
                <input type="text" name="telefono" id="telefono"   placeholder="Usuario"required>
                <label for="clave">Direccio </label>
                <input type="text" name="direccion" id="direccion" placeholder="Clave de acceso" required>
               
                <!-- <input type="file" name="imagen" id="imagen ">-->
                <input type="submit" value="Crear Usuario" class="btn_save" >
            </form>

        </div>
    </section>


    
    <?php include 'includes/footer.php';?>
</body>

</html>