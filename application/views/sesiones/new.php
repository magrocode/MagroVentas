<?php
   // esto imprime la etiqueta <form method="post" ...
   echo form_open('sesiones/validar_form',array('id' => 'formlogin'));
   // parámetros: dirección a donde se enviara el formulario - atributos
       
   // armamos los campos
   $txtEmail = array(
      'name'      => 'txtEmail',
      'id'        => 'txtEmail',
      'maxlength' => '50',
      'size'      => '15',
      // mantiene el valor previamente introducido
      'value'     => set_value('txtEmail')
   );
   $txtPassword = array(
      'name'      => 'txtPassword',
      'id'        => 'txtPassword',
      'value'     => '',
      'maxlength' => '25',
      'size'      => '15'              
    );
    $txtSesionTime = array(
       'name'      => 'txtSesLimite',
       'id'        => 'txtSesLimite',
       'value'     => '120',// minutos
       'maxlength' => '4',
       'size'      => '3' 
    );
    $btSubmit = array(
       'name'      => 'btSubmit',
       'id'        => 'btSubmit',
       'value'     => 'Iniciar sesion',
    );

    // se imprimen los campos
    echo form_label('Email: '),form_input($txtEmail);
    echo form_error('txtEmail');// mostramos el posible error
    
    echo form_label('Password: '),form_password($txtPassword);
    echo form_error('txtPassword');
    
    // este es un error global enviado desde el controlador
    if (!empty($sMsjError))
        echo "<div class='div_error'>* $sMsjError</div>";
    
    echo form_label('Duracion de la sesion (en minutos): '),
         form_input($txtSesionTime),form_error('txtSesLimite');
    
    echo '<br/>',form_submit($btSubmit);

    // cerramos el tag form
    echo form_close();// </from>
?>