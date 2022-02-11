<?php
function productoYaEstaEnCarrito($idProducto)
{
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];
    $sentencia = mysqli_query($conection, "SELECT codproducto FROM producto WHERE usuario_id =$idSesion");
    $data=mysqli_fetch_array($sentencia);
   $ids= $data['codproducto'];
   foreach ($data as $id) {
    if ($id == $idProducto) 
    return true;
     }
      return false;
}
function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];
    $query = mysqli_query($conection, "SELECT id_producto FROM carrito_usuarios ");
   /// while ($sentencia2 = mysqli_fetch_array($query)) {
     /// if ($sentencia2["id_producto"]==$idProducto) {
          # code...
     /// }else{
        $sentencia = mysqli_query($conection,"INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES ($idSesion, $idProducto)");
     // }
    ///}
  

  
    return $sentencia;
}
function obtenerProductosEnCarrito()
{
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];
    $query = mysqli_query($conection, "SELECT  p.codproducto, p.descripcion, p.precio, p.existencia, p.foto FROM producto p 
    INNER JOIN carrito_usuarios pr ON
     p.codproducto = pr.id_producto  WHERE pr.id_sesion=$idSesion AND p.estatus=1 ");
    return $query;
}

function obtenerIdsDeProductosEnCarrito()
{
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];

    $sentencia= mysqli_query($conection,"SELECT id_producto FROM carrito_usuarios WHERE id_sesion = $idSesion");
    return $sentencia;
}
function quitarProductoDelCarrito($idProducto)
{
    include "../conexion.php";
    $idSesion =  $_SESSION['idUser'];
    $sentencia= mysqli_query($conection,"DELETE FROM carrito_usuarios WHERE id_sesion = $idSesion AND id_producto = $idProducto");
    return $sentencia;
}


