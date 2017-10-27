

<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
      <div class="box-header">
            <h1>CREATE USER</h1>
      </div>
      <div class="box-body">
            <?= form_open("admin/users/create_user") ?>
                  <div class="row">
                        <?= custom_input_one('user[username]', "User Name", $user, 'col-md-3')  ?>
                        <?= custom_input_one('user[email]', "Email", $user, 'col-md-3')  ?>
                        <?= custom_select_one('user[auth_level]', 'Auth Level', $user->get_all_auths_levels, $user, 'col-md-3', ['here' => 'some'])  ?>
                  </div>

                  <?= form_submit('submit', "Save", 'class="btn btn-primary"');?>
            <?= form_close() ?>
      </div>
</div>
