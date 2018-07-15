<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Session - Delete</title>
</head>
<body>
<div class="body">
	<?php if (isset($_GET['iduser'])) { ?>
		<?php
			$iduser = $_GET['iduser'];
			$status = $_GET['status'];
			$ex = $cn->delete($iduser, $status);
			if ($ex == 'Success') {
				if ($ss->get('status') != 'admin' || $ss->get('iduser') == $iduser) {
					$ss->end();
				}
		?>
			<div class="frame-login">
				<div class="top">
					<h1>Delete Success</h1>
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
			<div class="frame-login">
				<div class="top">
					<h1>Delete Failed</h1>
					<p><?php echo $ex; ?></p>
				</div>
				<div class="mid">
					<div class="block">
						<a href="<?php echo base_url(); ?>">
							<input type="button" name="goback" class="btn btn-main-color btn-width-all" value="Go Back">
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
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
	<?php } ?>
</div>
</body>
</html>