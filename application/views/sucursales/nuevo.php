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
                <h1>Nueva Sucursal</h1>
            </div>

			<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>','</div>') ?>


			<?php echo form_open('sucursales/nuevo', array('class' => 'form-horizontal', 'id' => 'formNuevo')) ?>
			  	<div class="control-group">
			    	<?php echo form_label('Codigo: ', 'codigo', array('class' => 'control-label', 'for' => 'codigo')) ?>
			    	<div class="controls">
			      		<?php echo form_input(array('name' => 'codigo', 'id' => 'codigo', 'size' => '50', 'value' => set_value('codigo'))) ?>
			    	</div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Nombre: ', 'nombre', array('class' => 'control-label', 'for' => 'nombre')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'size' => '50', 'value' => set_value('nombre'))) ?>
				    </div>
			  	</div>
			  	<div class="form-actions">

					<?php echo form_submit(array('name' => 'enviar', 'value' => 'Enviar', 'class' => 'btn btn-primary')) ?>
					<button type="button" class="btn">Cancelar</button>
				</div>
			<?php echo form_close() ?>
        </div>
    </div>
</div>