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
                <h1>Sucursales</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre Sucursal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sucursales as $s):?>
                    <tr>
                        <td><?= $s->codigo ?></td>
                        <td><?= $s->nombre ?></td>
                        <td><small><a href="#">Mostrar</a> | <a href="<?= site_url("sucursales/editar/". $s->id ); ?>">Editar</a> | <a href="#">Eliminar</a></small></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
