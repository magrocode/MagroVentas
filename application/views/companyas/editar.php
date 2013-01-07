<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Actualizar Compania</h1>
            </div>

			<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>','</div>') ?>


			<?php echo form_open('companyas/actualizar', array('class' => 'form-horizontal', 'id' => 'formNuevo')) ?>
			  	<div class="control-group">
			    	<?php echo form_label('Rut: ', 'rut', array('class' => 'control-label', 'for' => 'rut')) ?>
			    	<div class="controls">
			      		<?php echo form_input(array('name' => 'rut', 'id' => 'rut', 'size' => '50', 'value' => set_value('rut', $rut))) ?>
			      		<?php echo form_input(array('type' => 'hidden', 'name' => 'id', 'id' => 'id', 'size' => '50', 'value' => set_value('id', $id))) ?>			      		
			    	</div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Nombre: ', 'nombre', array('class' => 'control-label', 'for' => 'nombre')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'size' => '50', 'value' => set_value('nombre', $nombre))) ?>
				    </div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Direccion: ', 'direccion', array('class' => 'control-label', 'for' => 'direccion')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('name' => 'direccion', 'id' => 'direccion', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
				    </div>
			  	</div>
			  	<div class="form-actions">

					<?php echo form_submit(array('name' => 'enviar', 'value' => 'Enviar', 'class' => 'btn btn-primary')) ?>
					o <?= anchor('companyas/mostrar/'.$id, 'Volver a la compania') ?>
				</div>
			<?php echo form_close() ?>
        </div>
    </div>
</div>