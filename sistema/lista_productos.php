<?php

session_start();
if ($_SESSION['rol'] != 1) {

  header("location: ./");
}
include "../conexion.php";
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

  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head>
<body>

<?php include 'includes/header.php';?>
	<section id="container">
		<h1>Lista Usuarios</h1>
        <a href="registro_usuario.php" class="btn_new">Crear Producto</a>
        <br>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Proveed</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
            <?php
            $sql_register = mysqli_query($conection, "SELECT COUNT(*) as total_registro  FROM producto  WHERE estatus = 1 ");
            $result_register=mysqli_fetch_array($sql_register);
            $total_registro=$result_register['total_registro'];
            $por_pagina=3;
            if (empty($_GET['pagina'])) {
                $pagina=1;
                # code...
            }else{
                $pagina=$_GET['pagina'];
            }
            $desde = ($pagina-1) * $por_pagina;
            $total_paginas=ceil($total_registro/$por_pagina);

      //      $query=mysqli_query($conection, "SELECT p.codproducto, p.descripcion, p.precio, p.existencia, pr.proveedor, p.foto 
      //      FROM producto p INNER JOIN proveedor pr ON
       //     p.proveedor = pr.codproveedor WHERE p.estatus=1 ORDER BY p.codproducto ASC LIMIT $desde,$por_pagina ");
        //    $result=mysqli_num_rows($query);
       //     if($result > 0){
        //        while($data=mysqli_fetch_array($query)){
           //         if($data[])
         //       }
        //    }

            ?>
         </thead>
         <tbody id="myTable">
            <?php
              
              $query = mysqli_query($conection, "SELECT  p.codproducto, p.descripcion, p.precio, p.existencia, pr.proveedor, p.foto FROM producto p 
              INNER JOIN proveedor pr ON
               p.proveedor = pr.codproveedor WHERE p.estatus=1");
            
              $result= mysqli_num_rows($query);
            

              if ($result>0) {
                while($data=mysqli_fetch_array($query)){
                    if ($data['foto'] !='img_producto.png') {
                        $foto='img/uploads/'. $data['foto'];
                       }else{
                      $foto='img/user1.jpg';
                      }
                    ?>
                    <tr>
                    <td><?php echo $data["codproducto"];?></td>
                    <td><?php echo $data["descripcion"];?></td>
                    <td><?php echo $data["precio"];?></td>
                    <td><?php echo $data["existencia"];?></td>
                    <td><?php echo $data["proveedor"];?></td>
                   <td><img width="100px" height="100px" class="foto1" src="<?php echo $foto;?>" alt="<?php echo $data["descripcion"];?>"></td>
                    <td>
                        <a class="link_edit"href="editar_producto.php?id=<?php echo $data["codproducto"];?>">Editar</a>
                
                        <?php
                         if ($data["codproducto"]!=1) {?>
                        <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["codproducto"];?>">Eliminar</a>
                     <?php }?>
                      </td>
                </tr>
           <?php
                }
              }
            ?>
         </tbody>
        </table>
	</section>
	<?php include 'includes/footer.php';?>
</body>
</html>