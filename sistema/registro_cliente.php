<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$nit = $_POST['nit'];
			$nombre  = $_POST['nombre'];
			$telefono  = $_POST['telefono'];
			$direccion  = $_POST['direccion'];
			$user_id   = $_SESSION['idUser'];


			$query = mysqli_query($conection,"SELECT * FROM cliente WHERE nit ='$nit'  ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO cliente(nit,nombre,telefono,direccion,usuario_id)
																	VALUES('$nit','$nombre','$telefono','$direccion','$user_id')");
				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}

			}


		}

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Registro usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">NIT</label>
				<input type="text" name="nit" id="nit" placeholder="Nombre completo">
				<label for="correo">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Correo electrónico">
				<label for="usuario">Telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Usuario">
				<label for="clave">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion de acceso">
				<label for="rol">Tipo Usuario</label>

				<input type="submit" value="Crear Cliente" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>