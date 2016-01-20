<header>
	<div class="content">
		<a href="index.html">
			<img src="<?php echo URL::base(); ?>assets/images/Canon-Logo-Black.png" alt="">
		</a>
		<button onclick="window.location='<?php echo URL::base(); ?>club/login/logout';">Cerrar sesión</button>
		<a  href="javascript:void(0);"  class="edit" onclick="perfil('<?php echo URL::base(); ?>club/club/detail',0);">
			<?php echo $userdata->name; ?>
		</a>
		<figure>
			
			<?php if('' == $userdata->logotipo): ?>
				<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
			<?php else: ?>
				<img src="<?php echo URL::base(); ?>assets/images/clubs/<?php echo $userdata->logotipo; ?>" alt="">
			<?php endif; ?>
		</figure>
	</div>
</header>