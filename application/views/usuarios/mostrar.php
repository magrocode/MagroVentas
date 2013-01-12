<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Usuario</h1>
            </div>
            <p>Email: <?= $email; ?></p>
            <p>Nombre: <?= $nombre; ?></p>
            <p>Apellidos: <?= $apellidos; ?></p>
            <br />
            <?php echo anchor('usuarios', 'Volver a los usuarios') ?>
        </div>
    </div>
</div>