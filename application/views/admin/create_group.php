<?= $this->load->view('templates/admin/message', null, true); ?>

      <div class="box">

            <div class="box-header">      
                  <h1><?= lang('create_group_heading');?></h1>
                  <p><?= lang('create_group_subheading');?></p>

            </div>

            <div class="box-body">
                  
                  <?= form_open("admin/create_group");?>
                        <div class="row">
                              <div class="col-md-3 form-group">
                                    <?= lang('create_group_name_label', 'group_name');?> <br />
                                    <?= form_input($group_name, null, 'class="form-control"');?>
                              </div>
     
                              <div class="col-md-3 form-group">
                                    <?= lang('create_group_desc_label', 'description');?> <br />
                                    <?= form_input($description, null, 'class="form-control"');?>
                              </div>
                        </div>
                              <?= form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-primary"');?>
                  <?= form_close();?>

            </div>  
      </div>
