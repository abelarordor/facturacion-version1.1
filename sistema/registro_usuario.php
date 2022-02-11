<?php
session_start();
if ($_SESSION['rol'] != 1) {

    header("location: ./");
}
include "../conexion.php";
$resultado=null;
  
if (!empty($_POST)) {
    $alert='';
   

    if (empty($_POST['nombre'])||empty($_POST['correo'])||empty($_POST['usuario'])||empty(
        $_POST['clave'])||empty($_POST['rol'])){
      $alert='<p class="msg_error">llne tofdo</p>';
    }else{
        $nombre= $_POST['nombre'];
        $email=$_POST['correo'];
        $user=$_POST['usuario'];
        $clave=md5($_POST['clave']);
        $rol=$_POST['rol'];

///////////// guarda foto en el programa
        $ffoto=$_FILES['imagen'];
        $nombre_foto=$ffoto['name'];
        $types=$ffoto['type'];
        $urls_temp=$ffoto['tmp_name'];
        $img_usuario="img_producto.png";

        if ($nombre_foto != '') {
            $destino='img/uploads/';
            $img_nombre="img_".md5(date('d-m-Y H:ms'));
            $img_usuario=$img_nombre.'.jpg';
            $src =$destino.$img_usuario;
        }
        move_uploaded_file($urls_temp,$src);
        $imagens=$destino.$img_nombre.'.jpg';
        list($width,$height)=getimagesize($imagens);
        $porcentaje=1.2;
        $new_width=$width*$porcentaje;
        $new_height=$width*$porcentaje;

  //////////////  guarda en la base
        $foto = $_FILES['imagen']['name'];
        $tmp_name= $_FILES['imagen']['tmp_name'];
        $error=$_FILES['imagen']['error'];
        $size=$_FILES['imagen']['size'];
       
        $max_size= 1024*1024*1;
        $type= $_FILES['imagen']['type'];
       
        
        if ($error) {
            $resultado='Ha ocurrido un error';
        }
        else if($size > $max_size)
        {
            $resultado='Eltamano supera el limite';
        }
        else if($type != 'image/jpg'&& $type != 'image/png' && $type != 'image/gif'){
            $resultado='Archivos permitidos jpg|png|gif';
        }
        else
        {
          $ruta='img/uploads/'.$foto;
      
        //  move_uploaded_file($tmp_name,$ruta);
          $resultado="la imagen ha sido guardado";
        }



        $query=mysqli_query($conection , "SELECT * FROM usuario WHERE usuario='$user' OR correo='$email'");
        $result=mysqli_fetch_array($query);
        if ($result>0) {

        $alert="<p class='msg_error'>El correo o el usuario ya esta</p>";
        }else{

         $query_insert=mysqli_query($conection,"INSERT INTO usuario(nombre,correo,usuario,clave,rol,foto)
         VALUES('$nombre','$email','$user','$clave','$rol','$img_usuario')");

           
         if ($query_insert) {  

            $alert='<p class="msg_save">Usuario creado correctamente</p>';
                         # code...
    }else{
        $alert='<p class="msg_error">Usuario no pudo ser creado correctamente</p>';
    }
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
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre"  onkeypress="return soloLetras(event)" placeholder="Nombre completo?" required>
                <label for="correo">Correo Electronico</label>
                <input type="email" name="correo" id="correo" placeholder="Correo electronico"  required>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario"  onkeypress="return soloLetras(event)"  placeholder="Usuario"required>
                <label for="clave">Clave</label>
                <input type="password" name="clave" id="clave" placeholder="Clave de acceso" required>
                <label for="rol">Tipo de Usuario</label>
                <?php
                 $query_rol=mysqli_query($conection,"SELECT * FROM rol");
                 mysqli_close($conection);
                 $result_rol= mysqli_num_rows($query_rol);
                
                 ?>
                <select name="rol" id="rol">
                    <?php
                      if($result_rol > 0)
                      {
                     while($rol = mysqli_fetch_array($query_rol)){
                         ?>
                    <option value="<?php echo $rol["idrol"];?>"><?php echo $rol["rol"]?></option>
                    <?php    
                     }
                     }
                     ?>
                </select>

                <div class="photo">
                    <label for="imagen">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="imagen"></label>
                    </div>
                    <div class="upimg">
                        <input type="file" name="imagen" id="imagen">
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