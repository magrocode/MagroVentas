<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Compan&iacute;a</h1>
            </div>
            <p>Rut: <?= $rut; ?></p>
            <p>Nombre: <?= $nombre; ?></p>
            <p>Direccion: <?= $direccion; ?></p>
            <br />
            <?= anchor('companyas/editar/'.$id, 'Editar') ?>
        </div>
    </div>
</div>

