<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?= lang('index_heading');?></h3>
		<div class="pull-right">
		<?= anchor('admin/users/create', lang('index_create_user_link'), 'class="btn btn-primary"')?>  
		<?= anchor('admin/groups/create', lang('index_create_group_link'), 'class="btn btn-primary"')?>
		</div>
	</div>

	<div class="box-body">
		<table class="table table-bordered table-hover dataTable">
			<thead class="bg-primary">
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
							<?php foreach ($user->groups as $group):?>
								<?= anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
							<?php endforeach?>
						</td>
						<td><?= ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
						<td><?= anchor("admin/users/{$user->id}/edit", 'Edit') ;?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot class="bg-primary">
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

