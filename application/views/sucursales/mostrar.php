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
                <h1>Sucursal</h1>
            </div>
            <p>Codigo: <?= $codigo; ?></p>
            <p>Nombre: <?= $nombre; ?></p>
            <br />
            <?php echo anchor('sucursales', 'Volver a las sucursales') ?>
        </div>
    </div>
</div>
