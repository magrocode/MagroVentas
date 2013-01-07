<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">		
		<div class="container-fluid">
			<a class="brand" href="<?= base_url() ?>index.php/paginas/home">MagroVentas</a>
			<div class="nav-collapse collapse navbar-inverse-collapse">
				<ul class="nav">
					<li>
						<a href="#">Ordenes</a>
					</li>
					<li>
						<a href="#">Clientes</a>
					</li>				
					<li>
						<?= anchor('productos', 'Productos'); ?>
					</li>
					<li>
						<?= anchor('proveedores', 'Proveedores'); ?>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li>
						<?= anchor('companyas/mostrar/'.$this->session->userdata('companya_id'), $this->session->userdata('nombre_companya')); ?>
					</li>
					<li class="dropdown">											
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?= $this->session->userdata('nombre_usuario'); ?>							
							<b class="caret"></b>	
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