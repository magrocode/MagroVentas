<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Proveedor</h1>
            </div>
            <p>Rut: <?= $rut; ?></p>
            <p>Nombre: <?= $nombre; ?></p>
            <br />
            <?php echo anchor('proveedores', 'Volver a los proveedores') ?>
        </div>
    </div>
</div>
