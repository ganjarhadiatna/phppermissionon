<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Session - Home</title>
</head>
<body>
<div class="body">
	
	<?php $detail = $cn->get_all(); ?>

	<?php if ($detail == 'Empty') { ?>
		<div class="frame-login">
			<div class="top">
				<h1>Users Empty</h1>
			</div>
			<div class="mid">
				<div class="block">
					<a href="<?php echo base_url('register.php'); ?>">
						<input type="button" name="register" class="btn btn-main-color btn-width-all" value="Register">
					</a>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div>
			<table class="table" border="0">
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($detail as $dt) { ?>
					<tr>
						<td><b><?php echo $i; ?></b></td>
						<td><?php echo $dt['name']; ?></td>
						<td><?php echo $dt['status']; ?></td>
						<td>
							<a href="<?php echo base_url('detail.php?iduser='.$dt['idusers']); ?>" class="link">
								View Detail
							</a>
						</td>
					</tr>
					<?php $i += 1; ?>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
</div>
</body>
</html>