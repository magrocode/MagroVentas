<?php
foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div class="container-fluid">
        <div class="row-fluid">
                <div class="span2"><p>Aqui algo</p></div>
                <div class="span10">
                	<div class="row">
                        <?php echo $output; ?>
                    </div>
                </div>
        </div>
</div>