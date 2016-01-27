<header>
	<div class="content">
	  <a href="index.html">
		<img src="<?php echo URL::base(); ?>assets/images/Canon-Logo-Black.png" alt="">
	 </a>
		<button>Cerrar sesión</button>
      <a  href="<?php echo URL::base(); ?>member/member/" data-toggle="modal" data-target="#myModal" class="edit">
      	Manuel Cárcamo
      </a>	
	 <figure>
	 		<?php if('' == $userdata->avatar): ?>
        	<img src="<?php echo URL::base(); ?>assets/images/photografer.jpg" alt="">
			<?php else: ?>
        		<img src="<?php echo URL::base(); ?>assets/images/members/<?php echo $userdata->avatar; ?>" alt="">
        	<?php endif; ?>
      </figure>
	</div>
</header>