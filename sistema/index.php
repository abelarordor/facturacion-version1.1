<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <?php include 'includes/scripts.php'; ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Sisteme Ventas</title>
</head>

<body>
<?php include 'includes/header.php';?>

  <h1>Sistema Facturacion</h1>



<!-- Carrousel-->
 <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/kitchen_adventurer_cheesecake_brownie.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/kitchen_adventurer_lemon.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/kitchen_adventurer_caramel.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<h1>Bienvenido al sistema</h1>
 <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
      class="fas fa-chevron-right"></i></a>
</div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">

    <div class="col-md-3" style="float:left">
     <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    
     <div class="col-md-3" style="float:left">
     <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.First slide-->

  <!--Second slide-->
  <div class="carousel-item">

    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-3" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.Second slide-->

 

</div>
<!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
     
      
          <section id="container">
            <div class="col-md-6 col-sm-6">
              <div class="card ml-5 text-center bg-transparent border-0 d-flex col-md-6" style="width: 20rem;">
                <img src="img/kitchen_adventurer_donut.jpg" class="card-img-top rounded-circle" alt="...">
                <div class="card-body cards ">
                  <h5 class="card-title text-uppercase">Ceviche</h5>
                  <p class="card-text">El ceviche es un aperitivo que consiste en pescado crudo fresco marinado en jugos cítricos como limón con hierbas finamente picadas y verduras. En Costa Rica, el mejor ceviche está hecho con tilapia local o corvina (lubina blanco) y el cilantro, el ajo, el ají, la cebolla y el apio.</p>
                  <p id="parrafo" style="display: none;">La carne que viene con un casado a la parrilla o salteados, pero nunca frito. A veces, el casado incluye papas fritas o verduras adicionales, tales como los aguacates.</p>
                  <a href="#" id="boton" class="btn btn-secondary">Leer Mas...</a>
                </div>
              </div>
            </div>
        </div>




        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="card ml-5 text-center bg-transparent border-0 col-md-6" style="width: 20rem;">
              <img src="img/kitchen_adventurer_caramel.jpg" class="card-img-top rounded-circle" alt="...">
              <div class="card-body cards ">
                <h5 class="card-title text-uppercase">Casado</h5>
                <p class="card-text">Casado o comida típica, es el plato más común en Costa Rica. <br> Se compone de frijoles, arroz con pimientos rojos finamente cortados en cubitos y cebollas, plátanos fritos, una ensalada de repollo con tomate y zanahoria, y una selección de carne entre pollo, pescado, carne de cerdo o de ternera con cebollas asadas.</p>
                <p id="parrafo" style="display: none;">La carne que viene con un casado a la parrilla o salteados, pero nunca frito. A veces, el casado incluye papas fritas o verduras adicionales, tales como los aguacates.</p>
                <a href="#" id="boton" class="btn btn-secondary">Leer Mas...</a>
              </div>
            </div>
          </div>
        </div>
     


      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="card ml-5 text-center bg-transparent border-0 col-md-6" style="width: 20rem;">
            <img src="img/kitchen_adventurer_caramel.jpg" class="card-img-top rounded-circle" alt="...">
            <div class="card-body cards ">
              <h5 class="card-title text-uppercase">Casado</h5>
              <p class="card-text">Casado o comida típica, es el plato más común en Costa Rica. <br> Se compone de frijoles, arroz con pimientos rojos finamente cortados en cubitos y cebollas, plátanos fritos, una ensalada de repollo con tomate y zanahoria, y una selección de carne entre pollo, pescado, carne de cerdo o de ternera con cebollas asadas.</p>
              <p id="parrafo" style="display: none;">La carne que viene con un casado a la parrilla o salteados, pero nunca frito. A veces, el casado incluye papas fritas o verduras adicionales, tales como los aguacates.</p>
              <a href="#" id="boton" class="btn btn-secondary">Leer Mas...</a>
            </div>
          </div>
        </div>
      </div>
      </section>






      <?php include 'includes/footer.php'; ?>
</body>

</html>