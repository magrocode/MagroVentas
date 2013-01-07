<ul class="nav nav-tabs nav-stacked">
    <li><?= anchor('companyas/mostrar/'.$this->session->userdata('companya_id'), 'Compania'); ?></li>
    <li><?= anchor('sucursales', 'Sucursales') ?></li>
    <li><?= anchor('empleados', 'Empleados') ?></li>
</ul>