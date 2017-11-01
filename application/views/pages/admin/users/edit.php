<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
      <div class="box-header">
            <h1>EDIT USER</h1>
      </div>
      <div class="box-body">
            <?php $IS_EDIT = TRUE;?>
            <?= form_open("backend/users/{$user->user_id}/update") ?>
                <?= $this->load->view('pages/admin/users/form', compact('IS_EDIT'), true); ?>
            <?= form_close() ?>

      </div>
</div>