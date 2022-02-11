
<?php
if (empty($_SESSION['active']))
{
    header('location: ../');
}
?>

<header>

<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <a class="navbar-brand" href="#">
    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
    BootstrapBay
  </a>

  <a class="navbar-brand" href="#">
  <p> <?php echo fechaC(); ?></p>			
  </a>
  <a class="navbar-brand" href="#">
  <span class="user"><?php echo $_SESSION['user'].'-'.$_SESSION['rol']; ?></span>
  <img class="photouser" src="img/user.png" alt="Usuario">
  </a>
 
  <a class="navbar-brand" href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>


</nav>
<?php include "nav.php";?>


</header>