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
							$classes = 'flaticon-check12 activeStatus';
						break;
					case 'Activo':
							$classes = 'flaticon-close7'; 
						break;
					case 'Rechazado':
							$classes = 'flaticon-chronometer';
						break;
					default:
						# code...
						break;
				}
			?>
			<?php if($status): ?>
				<p class="active">Finalizado</p>
			<?php else: ?>
			<span class="<?php echo $classes; ?>" ></span>
			<!--<span class="flaticon-pencil86" ></span>-->
			<?php endif; ?>
		</td>
		<td>
			<?php if(!$status): ?>
			<a href="galería.html" class="flaticon-images11 activeStatus" ></a>
			<a href="galería.html" class="flaticon-trophy36" ></a>
		<?php endif; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $pagination; ?>
</main>