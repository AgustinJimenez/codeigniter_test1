<br>
<div class="container-fluid">
<?php if( isset($message) ): ?>
        <div class="alert alert-warning fade in" id="infoMessage">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $message ?>
        </div>
<?php endif;?>
</div>