<section class="head">
	<div class="contentHead">
		<h2>Concursos</h2>
		<button onclick="window.location='<?php echo URL::base(); ?>club/competitions/add';">Crear Concurso</button>
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
<table class="cubles">
	<tr class="row">
		<td>Título del concurso</td>
		<td>Categoría</td>
		<td>Vigencia del concurso</td>
		<td>Fecha de solicitud</td>
		<td>Estatus</td>
		<td>Galería</td>
	</tr>
<?php foreach($competitions as $competition): ?>
	<?php $status = Helpers_Competitions::checkStatus($competition->finish_date); ?>
	<tr class="row <?php echo ($status)?'activeEnd':''; ?>">
		<td ><?php echo $competition->name; ?></td>
		<td><?php echo $competition->category; ?></td>
		<td>
			<?php echo Helpers_Dates::getMonth($competition->init_date); ?><br>
			<?php echo Helpers_Dates::getMonth($competition->finish_date); ?>
		</td>
		<td><?php echo Helpers_Dates::getMonth($competition->date); ?></td>
		<td>
			<?php 

				switch ($competition->status) {
					case 'Pendiente':
							$classes = '<span class="flaticon-check12 activeStatus"></span>'; $status = false;
						break;
					case 'Activo':
							$classes = '<span class="flaticon-close7"></span>'; $status = true;
						break;
					case 'Rechazado':
							$classes = '<span class="flaticon-chronometer"></span>'; $status = false;
						break;
					case 'Finalizado':
							$classes = '<p class="active">Finalizado</p>'; $status = true;
						break;
					default:
						# code...
						break;
				}
			?>
			<?php echo $classes; ?>
		</td>
		<td>
			<?php if($status): ?>
			<a href="<?php echo URL::base(); ?>club/competitions/gallery/<?php echo $competition->id_competition; ?>" class="flaticon-images11 activeStatus" ></a>
			<a href="<?php echo URL::base(); ?>club/competitions/gallery/<?php echo $competition->id_competition; ?>" class="flaticon-trophy36" ></a>
			<?php endif; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $pagination; ?>
</main>