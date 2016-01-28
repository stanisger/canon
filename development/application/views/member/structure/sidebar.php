<section class="nav">
	<div class="contentNav">
		<button onclick="window.location='<?php echo URL::base(); ?>member/competitions'" class="<?php echo ($active == 'Competitions')?'active':''; ?>"><span class="flaticon-setup6"></span>Concursos</button>
		<button onclick="window.location='<?php echo URL::base(); ?>member/photographs'" class="<?php echo ($active == 'Photographs')?'active':''; ?>"><span class="flaticon-images11"></span>Fotografías</button>
	</div>
</section>