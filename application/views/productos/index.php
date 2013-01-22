<script type="text/javascript">
function confirma_eliminar(){
    if (confirm("Realmente desea eliminar este producto?"))
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
            <?= $this->load->view('productos/menu_productos'); ?> 
        </div>
        <div class="span10">
            <div class="page-header">
                <h1>Productos</h1>
                <a href="<?= site_url('productos/nuevo') ?>" class="btn btn-primary">Nuevo producto</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sku</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto):?>
                    <tr>
                        <td><?= $producto->sku ?></td>
                        <td><?= $producto->nombre ?></td>
                        <td>
                            <small>
                                <a href="<?= site_url("productos/mostrar/". $producto->id ); ?>">Mostrar</a> | 
                                <a href="<?= site_url("productos/editar/". $producto->id ); ?>">Editar</a> | 
                                <a onclick="if(confirma_eliminar() == false) return false" href="<?= site_url("productos/eliminar/". $producto->id ); ?>">Eliminar</a>
                            </small>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
