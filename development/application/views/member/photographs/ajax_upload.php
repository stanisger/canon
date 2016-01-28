<section class="dowloadPhoto">
	<form action="<?php echo URL::base(); ?>member/competitions/upload/<?php echo $id_competition; ?>" method="POST" enctype="multipart/form-data">
		<article>
			<div class="headDowloadPhoto">Fotografia <span><?php echo $next_image; ?></span></div>
			<div class="contentDowloadPhoto row">
				<label  class="col-sm-12"cfor="title">Título de la fotografía</label>
				<input  name="name" class="col-sm-12"ctype="text" placeholder="Ingresa título de la fotografía">
				<aside class="col-sm-3">
					<h2>Ficha Técinca</h2>
					<label for="camera">Camara</label>
					<input type="text" name="camera">
					<label for="lent">Lente</label>
					<input type="text" name="lens">
					<label for="apertura">Apertura</label>
					<input type="text" name="opening">
				</aside>
				<aside class="col-sm-3">
					<h2></h2>
					<label for="velocity">Velocidad</label>
					<input type="text" name="speed">
					<label for="iso">ISO</label>
					<input type="text" name="iso">
				</aside>
				<aside class="col-sm-3">
					<h2>Etiquetas</h2>
					<textarea name="labels" id="tags" placeholder="Ingrese aquí las estiquetas"></textarea>
				</aside>
				<aside class="col-sm-3">
					<h2>Fotografías</h2>
					<div class="download">
						<span class="flaticon-arrow68" >
							<input type="file" name="file" id="file">
						</span>
						<p>Cargar Foto</p>
					</div>
				</aside>
			</div>
		</article>
		<input type="submit" style="display:none;" id="submit_upload_gallery">
	</form>
</section>
<button onclick="prev_submit();">
Enviar fotografía
</button>