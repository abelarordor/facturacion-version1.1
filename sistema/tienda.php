<?php

session_start();
if ($_SESSION['rol'] != 1) {

    header("location: ./");
}
include "../conexion.php";

include_once "funcionescarrito.php";

if (!empty($_POST)) {
    agregarProductoAlCarrito($_POST["id_producto"]);
    $alert='';
}else{

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include 'includes/scripts.php';?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sisteme Ventas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>

<?php include 'includes/header.php';?>
<h1>Carrito de Compra</h1>

<a href="ver_carrito.php" class="button is-success">
                            <strong  href="ver_carrito.php" >Ver carrito <?php
                           
                            $idSesion =  $_SESSION['idUser'];
                                                                                                                                                                         
                                                 $queryids = mysqli_query($conection,"SELECT id_producto FROM carrito_usuarios WHERE id_sesion = $idSesion");
                                                 $data = mysqli_fetch_array($queryids);
                                                 $rowCount = mysqli_num_rows($queryids);
                                                if ($rowCount > 0) {
                                                    printf("(%d)", $rowCount);
                                                }
                                                ?>&nbsp;<i class="fa fa-shopping-cart"></i></strong>
                        </a>
                        <a href="ver_carrito.php" class="btn_new">Crear Usuario</a>

	<section id="container">

    <div class="columns">
        <div class="column">
            <h2 class="is-size-2">Tienda</h2>
        </div>
    </div>
    <?php
    $count=0;
    $query = mysqli_query($conection, "SELECT  p.codproducto, p.descripcion, p.precio, p.existencia, pr.proveedor, p.foto FROM producto p 
              INNER JOIN proveedor pr ON
               p.proveedor = pr.codproveedor WHERE p.estatus=1");

    $result = mysqli_num_rows($query);
  



    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
            if ($data['foto'] != 'img_producto.png') {
                $foto = 'img/uploads/' . $data['foto'];
            } else {
                $foto = 'img/user1.jpg';
            }
    ?>

            <div class="columns">
                <div class="col-md-6 col-sm-6">
                    <div  class="card ml-5 text-center bg-transparent border-0 d-flex col-md-6" style="width: 20rem;">
                        <header class="card-header">
                            <p class="card-header-title is-size-4">
                                <?php echo $data["descripcion"]; ?>
                            </p>
                            <img  class="card-img-top rounded-circle" src="<?php echo $foto;?>" alt="<?php echo $data["descripcion"];?>">
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <?php echo $data["proveedor"]; ?>
                            </div>
                            <h1 class="is-size-3"><?php echo $data["precio"]; ?></h1>
                            <?php if (productoYaEstaEnCarrito($data["codproducto"])) { ?>
                                <form action="" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $data["codproducto"]; ?>">
                                    <span class="button is-success">
                                        <i class="fa fa-check"></i>&nbsp;En el carrito
                                    </span>
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>&nbsp;Quitar
                                    </button>
                                </form>
                            <?php } else { ?>
                                <form action="" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $data["codproducto"]; ?>">
                                    <?$count=0;?>
                                    <input type="hidden" name="id_producto"value="<?php echo $coun+=1;?>">
                                    <button class="button is-primary">
                                        <i class="fa fa-cart-plus" ></i>&nbsp;Agregar al carrito
                                    </button>
                                    
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


    
    <?php include 'includes/footer.php';?>
</body>
</html>