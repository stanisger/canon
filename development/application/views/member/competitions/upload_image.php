<section class="head" onload="myFunction()";>
	<div class="contentHead">
		<h2><?php echo $club->name; ?> /<strong> <?php echo $competition->name; ?></strong></h2>
	</div>
</section>
<section class="datesConcursoMembers">
	<div class="datesConcurso">
		<p>Categoría: <strong> <?php echo $competition->category; ?></strong></p>
		<p>Vigencia: <strong> <?php echo Helpers_Dates::getMonth($competition->init_date) . ' al ' . Helpers_Dates::getMonth($competition->finish_date); ?></strong></p>
	</div>
</section>
<div class="mainCreateCompetition">
	<section class="row">
		<article>
			<h4>Bases de concurso</h4>
			<p><?php echo $competition->foundations; ?></p>
			<button onclick="window.location='<?php echo URL::base(); ?>assets/images/competitions/<?php echo $competition->file; ?>'">Descargar Bases / PDF</button>
		</article>
		<article>
			<h4>Premios</h4>
			<?php $i=1; foreach($winners as $winner): ?>
			<aside class="row">
				<span class="col-xs-3 flaticon-trophy36"> <b><?php echo $i; ?></b></span>
				<div class="col-xs-9 textWinnerMembers">
					<p><?php echo $winner->description; ?></p>
				</div>
			</aside>
			<?php endforeach; ?>
			
			<!--
			<aside class="row">
				<span class="col-xs-3 flaticon-trophy36"> <b>3</b></span>
				<div class="col-xs-9 textWinnerMembers">
					<h5>Cámara profesional</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolorum quae tempore.</p>
				</div>
			</aside>
			<aside class="row">
				<span class="col-xs-3 flaticon-award52"></span>
				<div class="col-xs-9 textWinnerMembers">
					<h5>Cámara profesional</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolorum quae tempore.</p>
				</div>
			</aside>
			-->
		</article>
	</section>
	<section class="autor">
		Leyenda de derechos de autor
	</section>
	<section class="jurado row">
		<h4>Jurado</h4>
		<?php foreach($jury as $row): ?>
		<article class="col-sm-3">
			<?php if('' == $row->file): ?>
				<img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt="profileGeneric" >
			<?php else: ?>
				<img src="<?php echo URL::base(); ?>assets/images/jury/<?php echo $row->file; ?>" width="169px">
			<?php endif; ?>
			<div class="col-sm-8 textJuradoMembers">
				<strong><?php echo $row->name; ?></strong>
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo $row->url; ?>"><?php echo $row->url; ?></a>
			</div>
		</article>
		<?php endforeach; ?>		
	</section>
	<section class="pregunta">
		<a href="">
			¿Cómo subir fotografía?
		</a>
		<span class="flaticon-flag97"></span>
	</section>
	<?php $i=0; foreach($gallery as $row): $i++;?>
	<section class="dowloadPhoto">
		<form>
		<article>
			<div class="headDowloadPhoto">Fotografia <span><?php echo $i; ?></span></div>
			<div class="contentDowloadPhoto row">
				<label  class="col-sm-12"cfor="title">Título de la fotografía</label>
				<input  name="name" class="col-sm-12"ctype="text" placeholder="Ingresa título de la fotografía" value="<?php echo $row->name; ?>">
				<aside class="col-sm-3">
					<h2>Ficha Técinca</h2>
					<label for="camera">Camara</label>
					<input type="text" name="camera" value="<?php echo $row->camera; ?>">
					<label for="lent">Lente</label>
					<input type="text" name="lens" value="<?php echo $row->lens; ?>">
					<label for="apertura">Apertura</label>
					<input type="text" name="opening" value="<?php echo $row->opening; ?>">
				</aside>
				<aside class="col-sm-3">
					<h2></h2>
					<label for="velocity">Velocidad</label>
					<input type="text" name="speed" value="<?php echo $row->speed; ?>">
					<label for="iso">ISO</label>
					<input type="text" name="iso" value="<?php echo $row->iso; ?>">
				</aside>
				<aside class="col-sm-3">
					<h2>Etiquetas</h2>
					<textarea name="labels" id="tags" placeholder="Ingrese aquí las estiquetas"><?php echo $row->labels; ?></textarea>
				</aside>
				<aside class="col-sm-3">
					<h2>Fotografías</h2>
					<div class="download" style="background:transparent url('<?php echo URL::base(); ?>assets/images/gallery/<?php echo $row->file; ?>') no-repeat scroll center center / cover ">
						<span class="flaticon-arrow68" >
							<input type="file" name="file" id="file">
						</span>
						<p>Actualizar Foto</p>
					</div>
				</aside>
			</div>
		</article>
		</form>
	</section>
	<?php endforeach; ?>
	
	
	<section class="addPhoto" onclick="addUploadImage('<?php echo $primary_key; ?>');">
		<a href="javascript:void(0);" >
			Agregar fotografía
			<span class="flaticon-round69"></span>
		</a>
	</section>
	
</div>
