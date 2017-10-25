<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?= lang('index_heading');?></h3>
		<div class="pull-right">
			<a class="btn btn-primary" href="<?= site_url('admin/change_password') ?>"><?= $this->lang->line('change_password_heading') ?></a>
		</div>
	</div>

	<div class="box-body table-responsive">
		<table class="table table-bordered table-striped table-hover dataTable">
			<thead>
				<tr>
					<th><?= lang('index_fname_th');?></th>
					<th><?= lang('index_lname_th');?></th>
					<th><?= lang('index_email_th');?></th>
					<th><?= lang('index_groups_th');?></th>
					<th><?= lang('index_status_th');?></th>
					<th><?= lang('index_action_th');?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?= htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
						<td><?= htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
						<td><?= htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
						<td>
							<?php foreach ($user->groups as $group): ?>
								<?= anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), 'class="btn btn-xs btn-link btn-flat"') ;?><br />
							<?php endforeach; ?>
						</td>
						<td><?= ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), 'class="btn btn-success btn-flat"') : anchor("auth/activate/". $user->id, lang('index_inactive_link'), 'class="btn btn-warning btn-flat"');?></td>
						
						<td>
							<div class="btn-group">
								<a href="<?= "users/{$user->id}/edit" ?>" class="btn btn-flat btn-primary">
									<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
								</a>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<th><?= lang('index_fname_th');?></th>
					<th><?= lang('index_lname_th');?></th>
					<th><?= lang('index_email_th');?></th>
					<th><?= lang('index_groups_th');?></th>
					<th><?= lang('index_status_th');?></th>
					<th><?= lang('index_action_th');?></th>
				</tr>
			</tfoot>
		</table>
		 
	</div>

</div>

