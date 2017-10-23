

<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box box-primary">
      <div class="box-header">
            <h1><?= lang('create_user_heading');?></h1>
            <p><?= lang('create_user_subheading');?></p>
      </div>


      <div class="box-body">

            <?= form_open("auth/create_user");?>

                  <div class="row">
                        <div class="col-md-3 form-group">
                              <?= lang('create_user_fname_label', 'first_name');?> 
                              <?= form_input($first_name, null, 'class="form-control"');?>
                        </div>
                        <div class="col-md-3 form-group">
                              <?= lang('create_user_lname_label', 'last_name');?> 
                              <?= form_input($last_name, null, 'class="form-control"');?>
                        </div>
                        <?php
                        if($identity_column!=='email') 
                        {
                        echo lang('create_user_identity_label', 'identity');
                        echo '';
                        echo form_error('identity');
                        echo form_input($identity, null, 'class="form-control"');
                        }
                        ?>

                        <div class="col-md-3 form-group">
                              <?= lang('create_user_company_label', 'company');?> 
                              <?= form_input($company, null, 'class="form-control"');?>
                        </div>

                        <div class="col-md-3 form-group">
                              <?= lang('create_user_phone_label', 'phone');?> 
                              <?= form_input($phone, null, 'class="form-control"');?>
                        </div>

                  </div>

                  <div class="row">

                        <div class="col-md-3 form-group">
                              <?= lang('create_user_email_label', 'email');?> 
                              <?= form_input($email, null, 'class="form-control"');?>
                        </div>

                        

                        <div class="col-md-3 form-group">
                              <?= lang('create_user_password_label', 'password');?> 
                              <?= form_input($password, null, 'class="form-control"');?>
                        </div>

                        <div class="col-md-3 form-group">
                              <?= lang('create_user_password_confirm_label', 'password_confirm');?> 
                              <?= form_input($password_confirm, null, 'class="form-control"');?>
                        </div>

                  </div>


                  <?= form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?>

            <?= form_close();?>

      </div>
</div>

