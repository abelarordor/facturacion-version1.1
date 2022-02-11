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
  
    <title>Sisteme Ventas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stilo.css">
    <script>
    $(document).ready(function() {
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
        <a href="registro_usuario.php" class="btn_new">Crear Usuario</a>
        <br>


        <table>
            <form action="buscar_usuario.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                <input type="submit" value="Buscar" class="btn_search">
            </form>
            <form action="reportes.php" method="get"  class="form-inline">
                <input type="submit" value="Reportes" class="btn btn-primary">
            </form>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Usuarios</th>
                    <th>Rol</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
               $sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM usuario WHERE estatus =1");
               $result_register= mysqli_fetch_array($sql_registe);
               $total_registro=$result_register['total_registro'];
               $por_pagina=5;
               if(empty($_GET['pagina']))
               {
                 $pagina=1;

               }else{
                 $pagina=$_GET['pagina'];

               }
               $desde=($pagina-1)*$por_pagina;
               $total_paginas=ceil($total_registro/$por_pagina);



              $query = mysqli_query($conection, "SELECT u.idusuario,u.nombre,u.correo,u.usuario,r.rol,u.foto  
              FROM usuario u INNER JOIN rol r ON u.rol= r.idrol WHERE estatus = 1
               ORDER BY u.idusuario ASC LIMIT $desde,$por_pagina");
            
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
                    <td><?php echo $data["idusuario"];?></td>
                    <td><?php echo $data["nombre"];?></td>
                    <td><?php echo $data["correo"];?></td>
                    <td><?php echo $data["usuario"];?></td>
                    <td><?php echo $data["rol"];?></td>
                    <td><img width="100px" height="100px" class="foto1" src="<?php echo $foto;?>"
                            alt="<?php echo $data["nombre"];?>"></td>
                    <td>
                        <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["idusuario"];?>">Editar</a>

                        <?php
                         if ($data["idusuario"]!=1) {?>
                        <a class="link_delete"
                            href="eliminar_confirmar_usuario.php?id=<?php echo $data["idusuario"];?>">Eliminar</a>
                        <?php }?>
                    </td>
                </tr>
                <?php
                }
             }
            ?>
            </tbody>
        </table>
       <diV class="paginador">
         <ul>
           <?php
            if($pagina != 1){

          
           ?>
           <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
           <li><a href="?pagina=<?php echo $pagina=1; ?>">|<<</a></li>
       <?php 
         }
       for($i=1; $i<$total_paginas; $i++){
             if($i==$pagina){
               echo '<li class="pageSelected">'.$i.'</li>';
             }else{
             echo' <li><a href="?pagina='.$i.'">'.$i.'</a></li>';
             }
           }

           if ($pagina != $total_paginas) {
             ?>
            <li><a href="?pagina=<?php echo $pagina+1; ?>">|<</a></li>
            <li><a href="?pagina=<?php echo $total_paginas; ?>">|<<</a></li>
           <?php } ?>
        
         </ul>
       </diV>
      
    </section>
    <?php include 'includes/footer.php';?>
</body>

</html>