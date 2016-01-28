<section class="head">
	<div class="contentHead">
		<h2>Concursos</h2>
		<input type="text" placeholder="Buscar">
		<select name="orden" id="orden">
			<option value="Ordenar">Ordenar por:</option>
			<option value="ano">Año</option>
			<option value="concurso">Concurso</option>
			<option value="escuela">escuela</option>
		</select>
	</div>
</section>
<main>
<table >
	<tr >
		<td>Mis Clubs</td>
		<td>Concursos</td>
		<td>Categoría</td>
		<td>Vigencia</td>
		<td>No. de <br>fotografía</td>
		<td>Aplicar</td>
	</tr>
	<?php foreach($clubs as $club): ?>
	<tr class="infoClub">
		<td>
			<figure>
				<?php if('' == $club->logotipo): ?>
				<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
				<?php else: ?>
				<img src="<?php echo URL::base(); ?>assets/images/clubs/<?php echo $club->logotipo; ?>" alt="">
				<?php endif; ?>
			</figure>
			<p><?php echo $club->name; ?></p>
		</td>
		<?php $competitions = Helpers_Competitions::getByClub($club->id_club); ?>
		
		<td colspan="5">
			<?php foreach($competitions as $competition): ?>
			<div class="contentTable row">
				<div class="col-sm-3"><?php echo $competition->name; ?></div>
				<div class="col-sm-2"><?php echo $competition->category; ?></div>
				<div class="col-sm-2">Fecha del concurso</div>
				<div class="col-sm-2"> 3/3</div>
				<div class="col-sm-3"> 
					<?php 
						$status = $competition->status;
						switch ($status) {
							case 'Activo':
									$text = '<button  class="bgYellow" onclick="uploadImage('.$competition->id_competition.')">Sube tus fotos</button>'; 
								break;
							
							default:
								
								break;
						}
						echo $text;
					?>
					
				</div>
			</div>
			<?php endforeach; ?>
			<!--

			<button  class="bgGreen">En espera de resultados</button>
			<button  class="bgRed">Finalizado</button>

			-->
		</td>
	</tr>
	<?php endforeach; ?>
	<!--<tr class="infoClub">
			<td>
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
			</figure>
			<p>Club Encuadre</p>
		</td>
		<td colspan="5">
			<div class="contentTable row">
				<div class="col-sm-3">Nombre de concurso</div>
				<div class="col-sm-2">Categoría del concurso</div>
				<div class="col-sm-2">Fecha del concurso</div>
				<div class="col-sm-2"> 3/3</div>
				<div class="col-sm-3"> <button  class="bgGreen">
					En espera de resultados</button>
				</div>
			</div>
			<div class="contentTable row">
				<div class="col-sm-3">Nombre de concurso</div>
				<div class="col-sm-2">Categoría del concurso</div>
				<div class="col-sm-2">Fecha del concurso</div>
				<div class="col-sm-2"> 3/3</div>
				<div class="col-sm-3"> <button  class="bgRed">
					Finalizado</button>
				</div>
			</div>
			<div class="contentTable row">
				<div class="col-sm-3">Nombre de concurso</div>
				<div class="col-sm-2">Categoría del concurso</div>
				<div class="col-sm-2">Fecha del concurso</div>
				<div class="col-sm-2"> 3/3</div>
				<div class="col-sm-3"> <button  class="bgYellow">
					Sube tus fotos</button>
				</div>
			</div>
		</td>
	</tr>-->
</table>
<ul class="pagination">
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
</ul>
</main>