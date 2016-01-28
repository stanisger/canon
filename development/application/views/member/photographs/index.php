<section class="head">
	<div class="contentHead">
		<h2>FOTOGRAFÍAS</h2>
		<select name="ordenar" id="filter_my_gallery" placeholder=" Agrupar por">
			<option value="option" > Agrupar por Club</option>
			<?php foreach($clubs as $club): ?>
				<option value="<?php echo $club->id_club; ?>"><?php echo $club->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</section>
<div class="mainGallery">
	<div class="galleryContent">
		<section class="Collage effect-parent">
			<?php foreach($gallery as $row): ?>
			<div class="Image_Wrapper" data-caption="
				<h3><?php echo $row->name; ?></h3>
				<h4><?php echo Helpers_Photographs::CheckWinById($row->id_gallery); ?></h4>
				<h5><?php echo Helpers_Competitions::dataById($row->fk_competition,'name'); ?></h5>
				<p>
				<strong>
				<?php echo Helpers_Competitions::NameClubByCompetition($row->fk_competition); ?> | </strong> 
				<?php echo Helpers_Competitions::dataById($row->fk_competition,'category'); ?> | 
				<?php echo Helpers_Dates::getMonth(Helpers_Competitions::dataById($row->fk_competition,'init_date')); ?></p>
				">
				<span class="winnerPicture flaticon-trophy36"></span>
				<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
					<!--<img src="https://sbphotospecial.files.wordpress.com/2013/03/world-press-photo-2013-water-buffalo_64501_600x4501.jpg">-->
					<img src="<?php echo URL::base(); ?>assets/images/gallery/<?php echo $row->file; ?>">
				</a>
			</div>
			<?php endforeach; ?>
			<!--
			<div class="Image_Wrapper" data-caption="
				<h3>Nombre de la fotografia</h3>
				<h4>Primer Lugar</h4>
				<h5>Nombre del concurso</h5>
				<p><strong>Nombre de club | </strong> Categoría | Fecha</p>
				">
				<span class="winnerPicture flaticon-award52"></span>
				<a  href="#" data-toggle="modal" data-target=".bs-example-modal-lg2">
					<img src="http://www.exposureguide.com/images/photography-ebooks/trick-photography-abstract-face-ebook.jpg">
				</a>
			</div>
			<div class="Image_Wrapper" data-caption="
				<h3>Nombre de la fotografia</h3>
				<h4>Primer Lugar</h4>
				<h5>Nombre del concurso</h5>
				<p><strong>Nombre de club | </strong> Categoría | Fecha</p>
				">
				<a>
					<img src="https://nyoobserver.files.wordpress.com/2015/12/10380751_1555369474725820_2515898643941177336_n.jpg?quality=80&w=635">
				</a>
			</div>
			
			<div class="Image_Wrapper" data-caption="
				<h3>Nombre de la fotografia</h3>
				<h4>Primer Lugar</h4>
				<h5>Nombre del concurso</h5>
				<p><strong>Nombre de club | </strong> Categoría | Fecha</p>
				">
				<a>
					<img src="http://images.nationalgeographic.com/wpf/media-live/photos/000/873/cache/your-shot-rapids-bosnia-herzegovina_87316_600x450.jpg">
				</a>
			</div>
			<div class="Image_Wrapper" data-caption="
				<h3>Nombre de la fotografia</h3>
				<h4>Primer Lugar</h4>
				<h5>Nombre del concurso</h5>
				<p><strong>Nombre de club | </strong> Categoría | Fecha</p>
				">
				<a>
					<img src="http://i.dailymail.co.uk/i/pix/2013/12/02/article-2516663-19C53EDE00000578-413_964x616.jpg">
				</a>
			</div>
			-->
		</section>
		
	</div>
</div>