

<?php 
$alert='';
session_start();
if (!empty($_SESSION['active'])) {
    header('location: sistema/');
}else{
if (!empty($_POST)) {
   if (empty($_POST['usuario'])||empty($_POST['clave'])) 
   {
       
     $alert='Ingrese su usuario y contrasena';
   }else{
       require_once "conexion.php";
       $user = mysqli_real_escape_string($conection,$_POST['usuario']);
       $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));
       $query= mysqli_query($conection,"SELECT * FROM usuario WHERE usuario='$user' AND clave='$pass' ");

       $result= mysqli_num_rows($query);

       if ($result>0) {
          $data= mysqli_fetch_array($query);
          
          $_SESSION['active']= true;
          $_SESSION['idUser']= $data['idusuario'];
          $_SESSION['nuevoingreso']=$data['nombre'];
          $_SESSION['emailnuevo']=$data['email'];
          $_SESSION['userer']=$data['usuario'];
          $_SESSION['rol']=$data['rol'];

          header('location: sistema/');
      }else{
           $alert='El usuario o la clave  son incorrectos  ';
           session_destroy();
          
        }
   }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INICIAR SESION</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="img/login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usuario" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="clave" required>
    <label>
    <div> <?php echo isset($alert) ? $alert :''; ?></div>
      </label>
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</body>
</html>