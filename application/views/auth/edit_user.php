<?= $this->load->view('templates/admin/message', null, true); ?>
<div class="box">
      <div class="box-header">
            <h1><?= lang('edit_user_heading');?></h1>
            <?= lang('edit_user_subheading');?>
      </div>

      <div class="box-body">

            <?= form_open(uri_string());?>
                  <div class="row">
                        <div class="form-group col-md-3">
                              <?= lang('edit_user_fname_label', 'first_name');?> <br />
                              <?= form_input($first_name, null, 'class="form-control"');?>
                        </div>

                        <div class="form-group col-md-3">
                              <?= lang('edit_user_lname_label', 'last_name');?> <br />
                              <?= form_input($last_name, null, 'class="form-control"');?>
                        </div>

                        <div class="form-group col-md-3">
                              <?= lang('edit_user_company_label', 'company');?> <br />
                              <?= form_input($company, null, 'class="form-control"');?>
                        </div>

                        <div class="form-group col-md-3">
                              <?= lang('edit_user_phone_label', 'phone');?> <br />
                              <?= form_input($phone, null, 'class="form-control"');?>
                        </div>
                  </div>

                  <div class="row">
                        <div class="form-group col-md-3">
                              <?= lang('edit_user_password_label', 'password');?> <br />
                              <?= form_input($password, null, 'class="form-control"');?>
                        </div>

                        <div class="form-group col-md-3">
                              <?= lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                              <?= form_input($password_confirm, null, 'class="form-control"');?>
                        </div>

                        <?php if ($this->ion_auth->is_admin()): ?>
                              
                              <div class="form-group col-md-3">
                                    <h3><?= lang('edit_user_groups_heading');?></h3>
                                    <?php foreach ($groups as $group):?>
                                          
                                          <label class="checkbox">
                                                <?php
                                                      $gID=$group['id'];
                                                      $checked = null;
                                                      $item = null;
                                                      foreach($currentGroups as $grp) {
                                                      if ($gID == $grp->id) {
                                                            $checked= ' checked="checked"';
                                                      break;
                                                      }
                                                      }
                                                ?>
                                                <input type="checkbox" name="groups[]" value="<?= $group['id'];?>"<?= $checked;?>>
                                                <?= htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                          </label>
                                          
                                    <?php endforeach?>
                              </div>
                        <?php endif ?>
                  </div>

                  <?= form_hidden('id', $user->id);?>
                  <?= form_hidden($csrf); ?>

                  <?= form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>

            <?= form_close();?>
      </div>
</div>
