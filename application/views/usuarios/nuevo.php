<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Nuevo Usuario</h1>
            </div>

			<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>','</div>') ?>


			<?php echo form_open('usuarios/nuevo', array('class' => 'form-horizontal', 'id' => 'formNuevo')) ?>
			  	<div class="control-group">
			    	<?php echo form_label('Email: ', 'email', array('class' => 'control-label', 'for' => 'email')) ?>
			    	<div class="controls">
			      		<?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '200', 'value' => set_value('email'))) ?>
			      		<?php echo form_input(array('type' => 'hidden', 'name' => 'companya_id', 'id' => 'companya_id', 'size' => '50', 'value' => set_value('companya_id', $companya_id))) ?>
			    	</div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Nombre: ', 'nombre', array('class' => 'control-label', 'for' => 'nombre')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'size' => '50', 'value' => set_value('nombre'))) ?>
				    </div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Apellidos: ', 'apellidos', array('class' => 'control-label', 'for' => 'apellidos')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('name' => 'apellidos', 'id' => 'apellidos', 'size' => '50', 'value' => set_value('apellidos'))) ?>
				    </div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Password: ', 'password', array('class' => 'control-label', 'for' => 'password')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('type' => 'password', 'name' => 'password', 'id' => 'password', 'size' => '50', 'value' => set_value('password'))) ?>
				    </div>
			  	</div>
			  	<div class="control-group">
			    	<?php echo form_label('Confirmacion Password: ', 'confirmacion', array('class' => 'control-label', 'for' => 'confirmacion')) ?>			    	
				    <div class="controls">
				    	<?php echo form_input(array('type' => 'password', 'name' => 'confirmacion', 'id' => 'confirmacion', 'size' => '50', 'value' => set_value('confirmacion'))) ?>
				    </div>
			  	</div>
			  	<div class="form-actions">

					<?php echo form_submit(array('name' => 'enviar', 'value' => 'Enviar', 'class' => 'btn btn-primary')) ?>
					o <?= anchor('usuarios', 'Volver a los usuarios') ?>
				</div>
			<?php echo form_close() ?>
        </div>
    </div>
</div>