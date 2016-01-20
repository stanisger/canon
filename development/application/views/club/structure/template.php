<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Canon</title>
		<link rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/style_club.css">
	</head>
	<body>
		<?php echo $header ?>
		<?php echo $sidebar; ?>
		<?php echo $body; ?>
		<?php echo $footer; ?>
		<!-- Modal 1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content modalclubesBody">
					
				</div>
			</div>
		</div>
		<!-- Modal 2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content modalclubesBody">
					
				</div>
			</div>
		</div>
	</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!--<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/jquery.1.9.1.min.js"></script>-->
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/bootstrap.js"></script>
	<script>URL = '<?php echo URL::base(); ?>';</script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/canon_club.js"></script>
</html>