<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
      <div class="box-header">
            <h1>CREATE USER</h1>
      </div>
      <div class="box-body">

            <?= form_open("backend/users/create") ?>
                <?= $this->load->view('pages/admin/users/form', null, true); ?>
            <?= form_close() ?>

      </div>
</div>