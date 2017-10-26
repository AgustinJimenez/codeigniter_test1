<?= $this->load->view('templates/admin/message', null, true); ?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">USERS</h3>
		<div class="pull-right">
			<a class="btn btn-primary" href="<?= site_url('admin/change_password') ?>">CHANGE PASSWORD</a>
		</div>
	</div>

	<div class="box-body table-responsive">
		<table class="table table-bordered table-striped table-hover dataTable">
			<thead>
                <?php $columns = ['username', 'email', 'last login', 'level', 'actions']; ?>
				<tr>
                    <?php foreach($columns as $column): ?>
					    <th><?= $column; ?></th>
                    <?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?= $user->username ?></td>
						<td><?= $user->email ?></td>
                        <td><?= $user->last_login->format('d/m/Y H:i:s') ?></td>
						<td><?= $user->auth_level ?></td>
						<td>
							<div class="btn-group">
								<?= $user->edit_button ?>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
                    <?php foreach($columns as $column): ?>
                        <th><?= $column; ?></th>
                    <?php endforeach; ?>
				</tr>
			</tfoot>
		</table>
		 
	</div>

</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. </p>

<?= $this->load->view('templates/admin/import-datatable', null, true); ?>