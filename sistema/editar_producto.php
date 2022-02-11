<?php
session_start();
if ($_SESSION['rol'] != 1) {

    header("location: ./");
}
include "../conexion.php";


if (!empty($_POST)) {
    $alert = '';


    if (empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || $_POST['precio'] <= 0 || empty($_POST['foto_actual'])
    || empty($_POST['foto_remove'])||empty($_POST['id']) ) {
        $alert = '<p class="msg_error">llne tofdo</p>';
    } else {
        $codproducto = $_POST['id'];
        $proveedor = $_POST['proveedor'];
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $imgProducto = $_POST['foto_actual'];
        $imgRemove = $_POST['foto_remove'];

        $foto = $_FILES['foto'];
        $nombre_foto = $foto['name'];
        $type       = $foto['type'];
        $url_temp   = $foto['tmp_name'];
        //$imgproducto = 'img_producto.png';
        $upd='';

        if ($nombre_foto != '') {
            $destino = 'img/uploads/';
            $img_nombre = 'img_' . md5(date('d-m-Y H:m:s'));
            $imgProducto = $img_nombre.'.jpg';
            $src        = $destino.$imgProducto;
        }else{
            if ($_POST['foto_actual'] != $_POST['foto_remove']) {
                $imgProducto ="img_producto.png";
            }

        }



        $query_update = mysqli_query($conection, "UPDATE producto  SET descripcion ='$producto',
        proveedor = $proveedor,precio = $precio,foto = '$imgProducto'
                              WHERE codproducto = $codproducto");


        if ($query_update) {
            if (($nombre_foto != '' && ($_POST['foto_actual'] != 'img_producto.png')) ||($_POST['foto_actual'] != $_POST['foto_remove']))
            {
               unlink('img/uploads/'.$_POST['foto_actual']);
            }
            if ($nombre_foto != '') {
                move_uploaded_file($url_temp,$src);
            }

            $alert = '<p class="msg_save">Producto Actualizado correctamente</p>';
            # code...
        } else {
            $alert = '<p class="msg_error">Producto no pudo ser Actualizado correctamente</p>';
        }
    }
}



//MOSTRAR DATOS 
if (empty($_GET['id'])) {
    header('Location: lista_productos.php');
} else {
    $iduser = $_GET['id'];
    $sql = mysqli_query($conection, "SELECT p.codproducto, p.descripcion, p.precio, p.foto, pr.codproveedor,pr.proveedor 
    FROM producto  p  INNER JOIN proveedor pr  ON p.proveedor = pr.codproveedor
     WHERE p.codproducto = $iduser AND p.estatus = 1");
    //  mysqli_close($conection);
    $result_sql = mysqli_num_rows($sql);
    if ($result_sql == 0) {
        header('Location: lista_usuarios.php');
    } else {
        $option = '';
        while ($data = mysqli_fetch_array($sql)) {
            $descripcion = $data['descripcion'];
            $nombre = $data['precio'];
            $proveedor = $data['proveedor'];
            $codproveedor = $data['codproveedor'];
            $codproducto = $data['codproducto'];
            $precio = $data['precio'];
            if ($data['foto'] != 'img_producto.png') {
                $foto = '<img src="img/uploads/' . $data['foto'] . '" alt="Producto">';
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <?php include 'includes/scripts.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Registrar Uruario</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
    <div class=".header">
        <?php include 'includes/header.php'; ?>
    </div>
    <section id="container">
        <div class="form_register">
            <h1>
                Registro usuario
            </h1>
            <hr>
            <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $codproducto; ?>">
               <input type="hidden" id="foto_actual" name="foto_actual" value="<?php echo $foto;?>">
               <input type="hidden" id="foto_remove" name="foto_remove" value="<?php echo $foto; ?>">

                <label for="nombre">Proveedor</label>
                <?php
                $query_proveedor = mysqli_query($conection, "SELECT codproveedor, proveedor FROM proveedor WHERE estatus=1 ORDER BY proveedor ASC");
                $result_proveedor = mysqli_num_rows($query_proveedor);
                mysqli_close($conection);

                ?>
                <select name="proveedor" id="proveedor" class="notitemOne">
                    <option value="<?php echo $codproveedor; ?>" selected><?php echo $proveedor; ?></option>
                    <?php
                    if ($result_proveedor > 0) {
                        while ($proveedor = mysqli_fetch_array($query_proveedor)) {


                    ?>
                            <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto" placeholder="producto" value="<?php echo $descripcion; ?>">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Precio" value="<?php echo $precio; ?>">
                <!--    <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" required>-->



                <div class="photo">
                    <label for="foto">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                        <?php echo $foto; ?>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                </div>

                <!-- <input type="file" name="imagen" id="imagen ">-->
                <input type="submit" value="Actualizar Usuario" class="btn_save" onclick="ValidateEmail(document.form.correo)">
            </form>

        </div>
    </section>



    <?php include 'includes/footer.php'; ?>
</body>

</html>