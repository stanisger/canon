<section class="head">
	<div class="contentHead">
		<h2><strong>Nombre del concurso</strong> / Categoría</h2>
		<button class="btnWinners"> <span class="flaticon-trophy36 "></span>Publicar Ganadores</button>
		<button class="dwGallery"> <span  class="flaticon-downloading"></span>Descagar de galería</button>
	</div>
</section>
<div class="mainGallery">
	<section class="row">
		<div class="headWinners">
			<span class="flaticon-trophy36"></span>
			<h2>Selección de Ganadores</h2>
		</div>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-trophy36 col-sm-3">
					
				</span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-trophy36 col-sm-3"></span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-trophy36 col-sm-3">
					
				</span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<div class="uploadWinner">
				<input type="text" placeholder="Folio de la Fotografía">
				<button>Confirmar</button>
			</div>
			<div class="text row">
				<span class="flaticon-trophy36 col-sm-3">
					
				</span>
				<div class="detailsWinners col-sm-9">
				</div>
			</div>
		</article>
	</section>
	<section class="row">
		<div class="headWinners">
			<span class="flaticon-award52"></span>
			<h2>Selección de Meción Hórificas</h2>
		</div>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-award52 col-sm-3"></span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-award52 col-sm-3"></span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/pic1.jpg" alt="">
			</figure>
			<div class="text row">
				<span class="flaticon-award52 col-sm-3"></span>
				<div class="detailsWinners col-sm-9">
					<h4>Juna Luis Guerra</h4>
					<p>Nombre de la fotografía</p>
				</div>
			</div>
		</article>
		<article class="col-sm-3">
			<div class="uploadWinner">
				<input type="text" placeholder="Folio de la Fotografía">
				<button>Confirmar</button>
			</div>
			<div class="text row">
				<span class="flaticon-award52 col-sm-3"></span>
			</div>
		</article>
	</section>
	<div class="galleryContent">
		<section class="Collage effect-parent">
			<?php foreach($gallery as $row): ?>
			<div class="Image_Wrapper" data-caption="No. de folio: <strong><?php echo $row->id_gallery; ?></strong>">
				<a href="#" onclick="preview_image('<?php echo URL::base(); ?>club/competitions/preview/<?php echo $row->id_gallery; ?>');" data-toggle="myModal3" data-target=".bs-example-modal-lg">
					<img src="<?php echo URL::base(); ?>assets/images/gallery/<?php echo $row->file; ?>">
				</a>
			</div>
			<?php endforeach; ?>
		</section>
		<button> <span class="flaticon-round69"></span>Mostrar más fotografías</button>
	</div>
</div>