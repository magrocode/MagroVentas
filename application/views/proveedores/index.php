
<?php
foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

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
                                <h1>Proveedores</h1>
                        </div>
                        <?php echo $output; ?>
 
                </div>
        </div>
</div>