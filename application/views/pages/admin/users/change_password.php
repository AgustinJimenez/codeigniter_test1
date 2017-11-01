<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
      <div class="box-header">
            <h1>CHANGE PASSWORD</h1>
      </div>
      <div class="box-body">
            <?= form_open("backend/users/{$user->user_id}/change_password", 'id="form-change-password"') ?>
                
            <div class="row">
                <?= custom_input_one('new_password', "New Password", null, 'col-md-3', ['required' => 'required', 'type' => 'password'])  ?>
                <?= custom_input_one('confirm_new_password', "Confirm New Password", null, 'col-md-3', ['required' => 'required', 'type' => 'password'])  ?>
            </div>
            <?= form_submit('submit', "Save", 'class="btn btn-primary" id="submit-new-password"');?>

            <?= form_close() ?>

      </div>
</div>
<script src="<?= base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
<script>

      jQuery('#form-change-password').validate
      ({
            rules : 
            {
                  new_password : 
                  {
                        minlength : 5
                  },
                  confirm_new_password : 
                  {
                        minlength : 5,
                        equalTo : "#new_password"
                  }
            }
      });

$('#submit-new-password').click(function()
{
    console.log
    (
          $('#form-change-password').valid()
      );
});

</script>