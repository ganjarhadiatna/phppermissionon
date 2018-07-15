<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Session - Register</title>
</head>
<body>
<div class="body">
	<?php if (isset($_POST['register'])) { ?>
		<?php 
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$status = $_POST['status'];
			$ex = $cn->insert($name, $email, $password, $status);
		?>
		<?php if ($ex == 'Success') { ?>
			<div class="frame-login">
				<div class="top">
					<h1>Register Success</h1>
				</div>
				<div class="mid">
					<div class="block">
						<a href="<?php echo base_url(); ?>">
							<input type="button" name="next" class="btn btn-main-color btn-width-all" value="Next">
						</a>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="frame-login">
				<div class="top">
					<h1>Register Error</h1>
					<p><?php echo $ex; ?></p>
				</div>
				<div class="mid">
					<div class="block">
						<a href="<?php echo base_url('register.php'); ?>">
							<input type="button" name="logout" class="btn btn-main-color btn-width-all" value="Try Again">
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="frame-login">
			<div class="top">
				<h1>Register</h1>
			</div>
			<div class="mid">
				<form method="post" target="_self">
					<div class="block">
						<input type="text" name="name" class="txt txt-main-color" placeholder="Full Name" required="true">
					</div>
					<div class="block">
						<input type="email" name="email" class="txt txt-main-color" placeholder="Email" required="true" onfocus="true">
					</div>
					<div class="block">
						<input type="password" name="password" class="txt txt-main-color" placeholder="Password" required="true">
					</div>
					<div class="block">
						<div class="pl-rdi">
							<input type="radio" name="status" class="rdi" required="true" value="admin">
							Admin
						</div>
						<div class="pl-rdi">
							<input type="radio" name="status" class="rdi" required="true" value="dosen">
							Dosen
						</div>
						<div class="pl-rdi">
							<input type="radio" name="status" class="rdi" required="true" value="karyawan">
							karyawan
						</div>
					</div>
					<div class="block">
						<input type="submit" name="register" class="btn btn-main-color btn-width-all" value="Register">
					</div>
				</form>
			</div>
			<div class="bot"></div>
		</div>
	<?php } ?>
</div>
</body>
</html>