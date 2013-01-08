<script type="text/javascript">
function confirma_eliminar(){
    if (confirm("Realmente desea eliminar este usuario?"))
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
                <h1>Usuarios</h1>
                <a href="<?= site_url('usuarios/nuevo') ?>" class="btn btn-primary">Nuevo usuario</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario):?>
                    <tr>
                        <td><?= $usuario->email ?></td>
                        <td><?= $usuario->nombre ?></td>
                        <td>
                            <small>
                                <a href="<?= site_url("usuarios/mostrar/". $usuario->id ); ?>">Mostrar</a> | 
                                <a href="<?= site_url("usuarios/editar/". $usuario->id ); ?>">Editar</a> | 
                                <a onclick="if(confirma_eliminar() == false) return false" href="<?= site_url("usuarios/eliminar/". $usuario->id ); ?>">Eliminar</a>
                            </small>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>