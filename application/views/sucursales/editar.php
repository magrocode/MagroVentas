<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <ul class="nav nav-tabs nav-stacked">
                <li><a href="#">Uno</a></li>
                <li><a href="#">Dos</a></li>
            </ul>
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Editar Sucursal</h1>
            </div>
			
			<form class="form-horizontal" action="<?= site_url("sucursales/actualizar"); ?>" method="POST">
			  	<div class="control-group">
			    	<label class="control-label" for="inputCodigo">Codigo</label>
			    	<div class="controls">
			      		<input type="text" name="inputCodigo" id="inputCodigo" placeholder="Codigo" value="<?=$sucursal[0]->codigo ?>">
			    	</div>
			  	</div>
			  	<div class="control-group">
			    	<label class="control-label" for="inputNombre">Nombre</label>
				    <div class="controls">
				    	<input type="text" name="inputNombre" id="inputNombre" placeholder="Nombre" value="<?=$sucursal[0]->nombre ?>">
				    </div>
			  	</div>
			  	<div class="form-actions">
			  		<input type="hidden" name="id" value="<?= $sucursal[0]->id ?>" />
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
					<button type="button" class="btn">Cancelar</button>
				</div>
			</form>
        </div>
    </div>
</div>
