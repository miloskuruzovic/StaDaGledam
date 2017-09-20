<div class="container">
	<div class="row">
		<h1>List of users</h1>
	</div>
	<div class="row">
		<table class="table-hover users-table">
			<thead>
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
					<th>Change Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?= $user['users_id'] ?></td>
						<td><?= $user['username'] ?></td>
						<td><?= $user['email'] ?></td>
						<td class="status-col"><?= $user['status'] ?></td>
						<td>
							<form>
								<select class="form-control status-change" >
									<option value="0" 
									data-id="<?=  $user['users_id'] ?>"
									<?= ($user['status'] == 0)?"selected":"" ?> >Block</option>
									<option value="1"
									data-id="<?=  $user['users_id'] ?>" 
									<?= ($user['status'] == 1)?"selected":"" ?> >Activate</option>
									<option value="2"
									data-id="<?=  $user['users_id'] ?>"
									<?= ($user['status'] == 2)?"selected":"" ?> >Author</option>
									<option value="3"
									data-id="<?=  $user['users_id'] ?>"
									<?= ($user['status'] == 3)?"selected":"" ?> >Admin</option>
									<option value="4"
									data-id="<?=  $user['users_id'] ?>"
									<?= ($user['status'] == 4)?"selected":"" ?> >Super Admin</option>
								</select>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		var selects = $(".status-change");

		selects.on('change', function(){
			var value = this.value;
			var id = $(this).find(':selected').data('id');

			var params = id + '-' + value;

			$.get("<?= base_url().'user/status/' ?>"+params, function(){});

			var status = $(this).parent().parent().siblings(".status-col");
			status.html(value);
		})
	})
</script>