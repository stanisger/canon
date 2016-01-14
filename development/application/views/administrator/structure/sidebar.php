<section class="nav">
	<div class="contentNav">
		<button onclick="window.location='<?php echo URL::base(); ?>administrator/clubs'" class="<?php echo ($active == 'Clubs')?'active':''; ?>"><span class="flaticon-users82"></span>Clubes</button>
		<button onclick="window.location='<?php echo URL::base(); ?>administrator/competitions'" class="<?php echo ($active == 'Competitions')?'active':''; ?>"><span class="flaticon-setup6"></span>Concursos</button>
	</div>
</section>