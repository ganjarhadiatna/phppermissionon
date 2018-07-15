<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Session - Detail</title>
</head>
<body>
<div class="body">
	<?php $detail = $cn->get_detail($_GET['iduser']); ?>
	<div>
		<?php if ($detail == 'Empty') { ?>
			<div class="frame-login">
				<div class="top">
					<h1>User Empty</h1>
				</div>
				<div class="mid">
					<div class="block">
						<a href="<?php echo base_url(); ?>">
							<input type="button" name="goback" class="btn btn-main-color btn-width-all" value="Go Back">
						</a>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php foreach ($detail as $dt) { ?>
				<?php if ($ss->get('status') == 'admin' || $dt['status'] == $ss->get('status')) { ?>
					<table class="table" border="0">
						<tr>
							<th>Idusers</th>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<th>Created</th>
							<?php if ($ss->get('status') == 'admin' || $dt['idusers'] == $ss->get('iduser')) { ?>
								<th>Action</th>
							<?php } ?>
						</tr>
						<tr>
							<td><?php echo $dt['idusers']; ?></td>
							<td><?php echo $dt['name']; ?></td>
							<td><?php echo $dt['email']; ?></td>
							<td><?php echo $dt['status']; ?></td>
							<td><?php echo $dt['created']; ?></td>
							<?php if ($ss->get('status') == 'admin' || $dt['idusers'] == $ss->get('iduser')) { ?>
								<td>
									<a href="<?php echo base_url('delete.php?iduser='.$dt['idusers']); ?>" class="link">
										Delete User
									</a>
								</td>
							<?php } ?>
						</tr>
					</table>
				<?php } else { ?>
					<div class="frame-login">
						<div class="top">
							<h1>You don't have permission.</h1>
							</div>
							<div class="mid">
							<div class="block">
								<a href="<?php echo base_url(); ?>">
									<input type="button" name="logout" class="btn btn-main-color btn-width-all" value="Go Back">
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	</div>
</div>
</body>
</html>