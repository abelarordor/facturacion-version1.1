<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<?php
				if ($_SESSION['rol'] == 1) {
					?>
				
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="registro_usuario.php">Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
					</ul>
				</li>
				<?php } ?>
				<li class="principal">
					<a href="#">Clientes</a>
					<ul>
						<li><a href="registro_cliente.php">Nuevo Cliente</a></li>
						<li><a href="lista_usuarios.php">Lista de Clientes</a></li>
					</ul>
				</li>
				<?php
				if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
					?>
				<li class="principal">
					<a href="#"><i class="far fa-building"></i>Proveedores</a>
					<ul>
						<li><a href="registro_proveedor.php"><i class="fas fa-plus"></i>Nuevo Proveedor</a></li>
						<li><a href="lista_usuarios.php"><i class="far fa-list-alt"></i>Lista de Proveedores</a></li>
					</ul>
				</li>
				<?php } ?>
				<li class="principal">
					<a href="#">Productos</a>
					<ul>
					<?php
				if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
					?>
						<li><a href="registro_producto.php">Nuevo Producto</a></li>
				<?php } ?>

						<li><a href="lista_productos.php">Lista de Productos</a></li>
					</ul>
				</li>
				
				<li class="principal">
					<a href="#">Ventas</a>
					<ul>
						<li><a href="nueva_venta.php">Nuevo Venta</a></li>
						<li><a href="#">Ventas</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="tienda.php">Tienda</a>
               
					
				</li>
			</ul>
			
		</nav>