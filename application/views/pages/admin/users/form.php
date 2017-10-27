

<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
      <div class="box-header">
            <h1>CREATE USER</h1>
      </div>
      <div class="box-body">

            <?= form_open("backend/users/create") ?>
                  <div class="row">
                        <?= custom_input_one('username', "User Name", $user, 'col-md-3')  ?>
                        <?= custom_input_one('email', "Email", $user, 'col-md-3', ['required' => 'required', 'type' => 'email'])  ?>
                        <?= custom_select_one('auth_level', 'Auth Level', $user->get_all_auths_levels, $user, 'col-md-3')  ?>
                        <?= custom_input_one('passwd', "Password", $user, 'col-md-3', ['required' => 'required', 'type' => 'password'])  ?>
                  </div>
                  <?= form_submit('submit', "Save", 'class="btn btn-primary"');?>
            <?= form_close() ?>

      </div>
</div>