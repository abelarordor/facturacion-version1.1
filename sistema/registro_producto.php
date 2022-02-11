
<?php
session_start();
if ($_SESSION['rol'] != 1 and  $_SESSION['rol']!=2) {

    header("location: ./");
}
include"../conexion.php";
$resultado=null;

if (!empty($_POST)) {
    $alert='';
   

    if (empty($_POST['proveedor'])||empty($_POST['producto'])||empty($_POST['precio'])||$_POST['precio']<=0||empty(
        $_POST['cantidad']) ||$_POST['cantidad']<=0){
      $alert='<p class="msg_error">llne tofdo</p>';
    }else{
        $proveedor= $_POST['proveedor'];
        $producto= $_POST['producto'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];
        $usuario_id=$_SESSION['idUser'];
        
        $foto= $_FILES['foto'];
        $nombre_foto=$foto['name'];
        $type       =$foto['type'];
        $url_temp   =$foto['tmp_name'];
        $imgproducto='img_producto.png';

        if($nombre_foto != ''){
            $destino='img/uploads/';
            $img_nombre ='img_'.md5(date('d-m-Y H:m:s'));
            $imgproducto=$img_nombre.'.jpg';
            $src        =$destino.$imgproducto;
            }
        
    
        
         $query_insert=mysqli_query($conection,"INSERT INTO producto(proveedor,descripcion,precio,existencia,usuario_id,foto)
         VALUES('$proveedor','$producto','$precio','$cantidad','$usuario_id','$imgproducto')");

           
         if ($query_insert) {  
             if ($nombre_foto != '') {
                move_uploaded_file($url_temp,$src);
             }

            $alert='<p class="msg_save">Producto creado correctamente</p>';
                         # code...
    }else{
        $alert='<p class="msg_error">Producto no pudo ser creado correctamente</p>';
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
                <?php
                 $query_proveedor=mysqli_query($conection,"SELECT codproveedor, proveedor FROM proveedor WHERE estatus=1 ORDER BY proveedor ASC");
                 $result_proveedor=mysqli_num_rows($query_proveedor);
              mysqli_close($conection);
              
              ?>
               <select name="proveedor" id="proveedor">
                   <?php
                   if($result_proveedor > 0){
                    while($proveedor= mysqli_fetch_array($query_proveedor)){

                   
                   ?>
                   <option value="<?php echo $proveedor['codproveedor'];?>"><?php echo $proveedor['proveedor']; ?></option>
                   <?php
                    }
                   }
                   ?>

               </select>
                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto" placeholder="producto"  required>
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio"   placeholder="Precio"required>
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" required>
               


                <div class="photo">
	<label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto notBlock">X</span>
        <label for="foto"></label>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
</div>

                <!-- <input type="file" name="imagen" id="imagen ">-->
                <input type="submit" value="Crear Usuario" class="btn_save" onclick="ValidateEmail(document.form.correo)">
            </form>

        </div>
    </section>


    
    <?php include 'includes/footer.php';?>
</body>

</html>