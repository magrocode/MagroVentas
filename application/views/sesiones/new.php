<div class="container">
  <div id="formlogin" class="form-signin">
    <form action='<?php echo base_url(); ?>index.php/sesion/process' method='post' name='process'>
      <h3>Por favor autenticate</h3>
      <br />      
      <?php if(! is_null($msg)) echo $msg; ?>
      <label for='email'>Email:</label>
      <input type='text' name='email' id='email' size='25' /><br />
    
      <label for='password'>Password:</label>
      <input type='password' name='password' id='password' size='25' /><br />             
    
      <input type='Submit' value='Iniciar Sesion' class="btn btn-large btn-primary" />     
    </form>
  </div>
</div>