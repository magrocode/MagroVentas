<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">		
		<div class="container-fluid">
			<a class="brand" href="#">MagroVentas</a>
			<div class="nav-collapse collapse navbar-inverse-collapse">
				<ul class="nav">
					<li>
						<a href="#">Ordenes</a>
					</li>
					<li>
						<a href="#">Clientes</a>
					</li>				
					<li>
						<a href="#">Productos</a>
					</li>
					<li>
						<a href="#">Proveedores</a>
					</li>
					<li>
						<a href="#">Sucursales</a>
					</li>
					<li>
						<a href="#">Empleados</a>
					</li>
					<li>
						<a href="#">Empresa</a>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $usuario_nombre; ?>						
							<b class="caret"/>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?= base_url() ?>index.php/sesion/signout">Salir</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

