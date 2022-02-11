<?php
include_once "funcionescarrito.php";
if (!empty($_POST["id_producto"])) {

    quitarProductoDelCarrito($_POST["id_producto"]);
    $alert='';
}

# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: ver_carrito.php");
} else {
    header("Location: tienda.php");
}
