<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Sucursal</h1>
            </div>
            <p>Codigo: <?= $codigo; ?></p>
            <p>Nombre: <?= $nombre; ?></p>
            <br />
            <?php echo anchor('sucursales', 'Volver a las sucursales') ?>
        </div>
    </div>
</div>
