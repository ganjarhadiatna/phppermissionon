<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="public/css/app.css">
</head>
<body>
	<?php include 'asset/asset.php'; ?>
	<?php include 'asset/database.php'; ?>
	<?php include 'asset/session.php'; ?>

	<?php 
		$cn = new database();
		$ss = new session(); 

		$ss->start();
	?>
	<div class="header">
		<div class="content">
			<div class="logo">
				<a href="<?php echo base_url(''); ?>">
					<?php if (!empty($ss->get('iduser'))) { ?>
						Hi <?php echo $ss->get('status'); ?>
					<?php } else { ?>
						Session
					<?php } ?>
				</a>
			</div>
			<div class="menu">
				<?php if (!empty($ss->get('iduser'))) { ?>
					<a href="<?php echo base_url('logout.php'); ?>">
						<input type="button" name="logout" class="btn btn-sekunder-color" value="Logout">
					</a>
				<?php } else { ?>
					<a href="<?php echo base_url('login.php'); ?>">
						<input type="button" name="login" class="btn btn-sekunder-color" value="Login" style="margin-right: 10px;">
					</a>
					<a href="<?php echo base_url('register.php'); ?>">
						<input type="button" name="register" class="btn btn-main-color" value="Register">
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>