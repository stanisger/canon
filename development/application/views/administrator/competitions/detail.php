<div class="headerModalLarge row">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true" class="flaticon-forbidden15"></span>
	</button>
	<div class="clubDetails">
		<figure>
			<?php if('' == $club->logotipo): ?>
			<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
			<?php else: ?>
			<img src="<?php echo URL::base(); ?>assets/images/clubs/<?php echo $club->logotipo; ?>" alt="">
			<?php endif; ?>
		</figure>
		<h6 class=" col-xs-12 col-sm-12"><?php echo $club->name; ?></h6>
	</div>
	<h5 class=" col-xs-12 col-sm-12">
	<td class="col-xm-4 col-sm-2"><?php echo $competition->name; ?></h5>
	</div>
	<div class="details row">
		<p class=" col-xs-12 col-sm-3"> Concurso:<span> <?php echo $competition->category; ?></span></p>
		<p class=" col-xs-12 col-sm-9"> Vigencia:<span> <?php echo Helpers_Dates::getMonth($competition->init_date) . ' al ' . Helpers_Dates::getMonth($competition->finish_date); ?></span></p>
	</div>
	<div class="contentDetails row">
		<h6  class="col-xs-12">Bases del Concurso</h6>
		<p  class="col-xs-12"><?php echo $competition->foundations; ?></p>
		<button onclick="window.location='<?php echo URL::base(); ?>assets/images/competitions/<?php echo $competition->file; ?>'">Descarga Bases/PDF</button>
		<h6 class="col-xs-12">Premios</h6>
		<?php $i=1; foreach($winners as $winner): ?>
		<article class="winner col-xs-4">
			<span class="flaticon-trophy36"> <b><?php echo $i; ?></b></span>
			<div class="textWinner">
				<h4>Premio</h4>
				<p><?php echo $winner->description; ?></p>
			</div>
		</article>
		<?php $i++; endforeach; ?>
		
		<div class="clear"></div>
		<!-- clear  *********-->
		<!--<article class="winner col-xs-4">
			<span class="flaticon-award52"></span>
			<div class="textWinner">
				<h4>Meción Honorifica</h4>
				<p>Detalles Lorem ipsum dolor sit amet,
				Detalles Lorem ipsum dolor sit amet,</p>
			</div>
		</article>-->
	</div>
	<div class="row jurado">
		<h4 class="col-xs-12">Jurado</h4>
		<?php foreach($jury as $row): ?>
		<article class="col-xs-12 col-sm-4">
			<?php if('' == $row->file): ?>
			<img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt="profileGeneric">
			<?php else: ?>
				<img src="<?php echo URL::base(); ?>assets/images/jury/<?php echo $row->file; ?>">
			<?php endif; ?>
			<div class="text">
				<h4><?php echo $row->name; ?></h4>
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo $row->url; ?>"><?php echo $row->url; ?></a>
			</div>
		</article>
		<?php endforeach; ?>
		
	</div>
	<div class="foot row">
		<div class="contentFoot">
			<p>¿Desea aurorizar este concurso?</p>
			<div class="buttons">
				<span data-dismiss="modal" class="flaticon-chronometer yellow"></span>
				<span onclick="changeStatusCompetition('<?php echo $competition->id_competition; ?>','Activo');" class="flaticon-check12 blue"></span>
				<span onclick="changeStatusCompetition('<?php echo $competition->id_competition; ?>','Rechazado');" class="flaticon-close7 red"></span>
			</div>
		</div>
	</div>