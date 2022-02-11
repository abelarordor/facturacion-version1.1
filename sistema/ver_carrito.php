
<?php
session_start();
if ($_SESSION['rol'] != 1 and  $_SESSION['rol']!=2) {

    header("location: ./");
}
include"../conexion.php";

if (!empty($_POST)) {
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];
    $idProducto= $_POST["id_producto"];
    $sentencia4= mysqli_query($conection,"DELETE FROM carrito_usuarios WHERE id_sesion = $idSesion ");
    header("location: tienda.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include 'includes/scripts.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/stilo.css">
    <title>Sisteme Ventas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>
<?php include 'includes/header.php';?>

    <?php
    include "../conexion.php";
    $idnec = $_SESSION['idUser'];
   
    $query = mysqli_query($conection, "SELECT id_producto FROM carrito_usuarios WHERE id_sesion = $idnec");
    $sentencia = mysqli_fetch_array($query);
    $countcarr = mysqli_num_rows($query);
    $query2 = mysqli_query($conection, "SELECT  p.codproducto, p.descripcion, p.precio, p.existencia, p.foto FROM producto p 
    INNER JOIN carrito_usuarios pr ON
     p.codproducto = pr.id_producto  WHERE pr.id_sesion=$idnec AND p.estatus=1 ");



    if ($countcarr <= 0) {
    ?>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Todavía no hay productos
                    </h1>
                    <h2 class="subtitle">
                        Visita la tienda para agregar productos a tu carrito
                    </h2>
                    <a href="tienda.php" class="button is-warning">Ver tienda</a>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <div class="columns">
            <div class="column">
                <h2 class="is-size-2">Mi carrito de compras</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $arrayid=array();
                        $i=0;
                        $data=array();
                        while($sentencia2 = mysqli_fetch_array($query2)) {
                            $total += $sentencia2['precio'];
                        ?>
                            <tr>
                          
                                <td><?php echo  $sentencia2['descripcion'] ?></td>
                              
                                <td><?php echo  $sentencia2['existencia'] ?></td>
                                <?php
                                  $data[$i] = $sentencia2["codproducto"];
                                  
                                  var_dump($data);
                                  $i+=1;
                        
                                ?>
                                
                                <td><?php echo number_format($sentencia2['precio'], 2) ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input id="id_producto" type="hidden" name="id_producto" value="<?php echo $sentencia2['codproducto'] ?>">
                                        <input type="hidden" name="redireccionar_carrito">
                                        <button class="button is-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php } ?>
                            </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                            <td colspan="2" class="is-size-4">
                                $<?php echo number_format($total, 2) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <a  class="link_add add_orden"  orden="<?php echo $idnec?>"data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check"></i>&nbsp;Terminar compra</a>
            </div>
        </div>
    <?php } ?>
<!--modal-->
<form name="formorden" action="orden.php"  method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Relizar Compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h1>DESEA GUARDAR  COMPRA</h1>
      <!--<input type="hidden" name="id" value="<?php echo $codproducto; ?>">-->
        <input type="hidden" id="total" name="total" value="<?php echo $total;?>">
        <?php var_dump($data);?>
        <input type="hidden" name="result" value="<?php echo  base64_encode(serialize($data)); ?>" >
        
      </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input    type="submit" class="btn btn-primary" value="guardar">
      </div>
    </div>
  </div>
</div>
</form>
</body>

</html>