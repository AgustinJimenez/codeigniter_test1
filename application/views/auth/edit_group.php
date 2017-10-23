<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box box-primary">
      <div class="box-header">
            <h1><?php echo lang('edit_group_heading');?></h1>
            <p><?php echo lang('edit_group_subheading');?></p>
      </div>

      <div class="box-body">

      <?php echo form_open(current_url());?>

      <div class="row">
            <div class="col-md-3 form-group">
                  <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                  <?php echo form_input($group_name, null, 'class="form-control"');?>
            </div>

            <div class="col-md-3 form-group">
                  <?php echo lang('edit_group_desc_label', 'description');?> <br />
                  <?php echo form_input($group_description, null, 'class="form-control"');?>
            </div>
      </div>

      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"');?></p>

      <?php echo form_close();?>

      </div>
</div>