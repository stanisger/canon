<section class="nav">
	<div class="contentNav">
		<button onclick="window.location='<?php echo URL::base(); ?>club/competitions'" class="<?php echo ('Competitions' == $active)?'active':''; ?>"><span class="flaticon-setup6"></span>Concursos</button>
		<button onclick="window.location='<?php echo URL::base(); ?>club/members'" class="<?php echo ('Members' == $active)?'active':''; ?>"><span class="flaticon-users82"></span>Miembros</button>
	</div>
</section>