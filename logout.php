<?php include 'header.php'; ?>
<?php 
	$ss->end();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Session - Login</title>
</head>
<body>
<div class="body">
	<div class="frame-login">
		<div class="top">
			<h1>Logout Success</h1>
		</div>
		<div class="mid">
			<div class="block">
				<a href="<?php echo base_url(); ?>">
					<input type="button" name="logout" class="btn btn-main-color btn-width-all" value="Go Back">
				</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>