<!DOCTYPE html>
<html>
<?= $this->load->view('templates/admin/head', null, true); ?>
<!--
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?= $this->load->view('templates/admin/main-header', null, true); ?>
<?= $this->load->view('templates/admin/main-sidebar', null, true); ?>
 <div class="content-wrapper">
     <br>
    <div class="container-fluid">
    <?php if( isset($message) ): ?>
            <div class="alert alert-warning fade in" id="infoMessage">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $message ?>
            </div>
    <?php endif;?>
    </div>

 <section class="content container-fluid">
 <div class="row">
 <div class="col-xs-12">