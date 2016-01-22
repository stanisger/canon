<section class="head">
	<div class="contentHead">
		<h2>Crear Concursos</h2>
	</div>
</section>
<form action="<?php echo URL::base(); ?>club/competitions/add" method="POST" enctype="multipart/form-data">
	<div class="mainCreateCompetition">
		<section>
			<article>
				<span>1</span>
				<h2>Datos de Concurso</h2>
			</article>
			<article>
				<label for="title">Título de Concurso <sup>*</sup></label>
				<input type="text" placeholder="ej. Bailes típicos méxicanos" name="name">
				<label for="categoty"> Categoría <sup>*</sup></label>
				<input type="text" placeholder="Ingrese Categoría" name="category">
			</article>
			<article>
				<label for="descript"> Descripción</label>
				<textarea name="description" id="descript" cols="30" rows="5" placeholder="Máximo 200 caracteres"></textarea>
			</article>
		</section>
		<section>
			<article>
				<span>2</span>
				<h2>Vigencia, Bases y Prmios</h2>
			</article>
			<article >
				<label for="date">Fecha de inicio  <sup>*</sup></label>
				<input type="text" id="txtFromDate" name="init_date" />
				<label for="date">Fecha de Finalización <sup>*</sup></label>
				<input type="text" id="txtToDate" name="finish_date"/>
			</article>
			<article>
				<input type="file" name="file" style="display:none;" id="file">
				<div class="bases row">
					<label class=" col-sm-12"for="bases">Bases <sup>*</sup></label>
					<p class="col-sm-4">Sube la información de las bases de concurso en formato PDF.</p>
					
					<button type="button" class="col-sm-4" onclick="$('#file').trigger('click');">Examiniar Archivo PDF</button>
					<p class="col-sm-4">
						Nobre del Documento Cargado
					</p>
				</div>
				<div class="premios row">
					<label  class=" col-sm-12" for="premios">Premios</label>
					<input id="num_winners" type="text"  class="col-sm-4" placeholder="Número de Ganadores">
					<div id="cont_num_winners">
						
					</div>
				</div>
				<div class="mencion row">
					<span class=" col-sm-1 flaticon-award52"></span>
					<p class="col-sm-6" >Ingrese el número de <strong>Meciones honorificas</strong></p>
					<input name="num_honorific" class="col-sm-5" type="text" placeholder="Número de menciones">
				</div>
			</article>
		</section>
		<section>
			<article>
				<span>3</span>
				<h2>Registro de Jurado</h2>
			</article>
			
			<article class="row juryPanel">
				
				<div class="col-sm-4 detailsJurado child1">
					<label>Datos de Jurado</label>
					<span class="flaticon-arrow68">
						<input type="file" name="avatar_jury[]">
						<p id="cargarPic">Cargar Foto</p>
					</span>
					<div class="datesJurado col-6-sm">
						<input type="text" name="name_jury[]" placeholder="Nombre completo*">
						<input type="text" name="description_jury[]" placeholder="Descripción*">
						<input type="text" name="url_juty[]" placeholder="URL del sitio (opcional)">
					</div>
				</div>
				
				
				<div class=" col-sm-4 datosJuradoDefault" onclick="addJury();">
					<a href="javascript:void(0);" >
						<span  class="flaticon-round69"></span>
						<p>Agregar Jurado</p>
					</a>
				</div>
			</article>
		</section>
		<button>Crear concurso</button>
	</div>
</form>