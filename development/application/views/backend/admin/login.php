<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
		<?php echo $error; ?>
		<form action="<?php echo URL::base(); ?>admin/login" method="POST">
			<input type="text" name="correo_electronico" value="">
			<input type="password" name="contrasena">
			<input type="hidden" name="security_token" value="<?php echo Security::token(); ?>">
			<input type="submit">
		</form>
</body>
</html>