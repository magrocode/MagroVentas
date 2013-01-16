<script type="text/javascript">
function confirma_eliminar(){
    if (confirm("Realmente desea eliminar este proveedor?"))
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
                <h1>Proveedores</h1>
                <a href="<?= site_url('proveedores/nuevo') ?>" class="btn btn-primary">Nuevo proveedor</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proveedores as $proveedor):?>
                    <tr>
                        <td><?= $proveedor->rut ?></td>
                        <td><?= $proveedor->nombre ?></td>
                        <td>
                            <small>
                                <a href="<?= site_url("proveedores/mostrar/". $proveedor->id ); ?>">Mostrar</a> | 
                                <a href="<?= site_url("proveedores/editar/". $proveedor->id ); ?>">Editar</a> | 
                                <a onclick="if(confirma_eliminar() == false) return false" href="<?= site_url("proveedores/eliminar/". $proveedor->id ); ?>">Eliminar</a>
                            </small>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
