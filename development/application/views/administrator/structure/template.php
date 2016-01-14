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
		
		<!-- Small modal -->
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div class="modal-content remove modalSmall">
					<div class="headModalSmall">
						<span class="flaticon-forbidden15" data-dismiss="modal"></span>
					</div>
					<p>¿Esta seguro de eleminar el club?</p>
					<button  data-dismiss="modal" >SI</button>
					<button  data-dismiss="modal" >NO</button>
				</div>
			</div>
		</div>
	</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/canon.js"></script>
</html>