<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Canon</title>
		<link rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/style.css">
		
	</head>
	<body>
		<?php echo $header; ?>
		<?php echo $sidebar; ?>
		<?php echo $body; ?>
		<?php echo $footer; ?>
		
		<!-- Modal 1 -->
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content modalclubesBody">
					
				</div>
			</div>
		</div>
		<!-- Modal  2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div class="modal-content remove modalSmall">
					
				</div>
			</div>
		</div>
		<!-- Modal 3 -->
		<div class="modal fade bs-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content modalLarge">
				</div>
			</div>
		</div>
	</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/bootstrap.js"></script>
	<script>URL = '<?php echo URL::base(); ?>';</script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/canon.js"></script>
</html>