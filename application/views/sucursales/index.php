<script type="text/javascript">
function confirma_eliminar(){
    if (confirm("Realmente desea eliminar esta sucursal?"))
    {
        return true
    } else {
        return false
    }
}
</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?= $this->load->view('companyas/menu_companya'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Sucursales</h1>
                <a href="<?= site_url('sucursales/nuevo') ?>" class="btn btn-primary">Nueva sucursal</a>
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
                        <td>
                            <small>
                                <a href="<?= site_url("sucursales/mostrar/". $s->id ); ?>">Mostrar</a> | 
                                <a href="<?= site_url("sucursales/editar/". $s->id ); ?>">Editar</a> | 
                                <a onclick="if(confirma_eliminar() == false) return false" href="<?= site_url("sucursales/eliminar/". $s->id ); ?>">Eliminar</a>
                            </small>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
