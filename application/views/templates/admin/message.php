<?php if( isset($message) ): ?>
    <div class="container-fluid">
        <div class="alert alert-<?= isset($message['type'])?$message['type']:'danger' ?> fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $message['body'] ?>
        </div>
    </div>
<?php endif;?>