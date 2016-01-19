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
<table class="cubles">
	<tr class="row">
		<td class="col-xm-4 col-sm-2">Título del Concurso</td>
		<td class="col-xm-4 col-sm-2">Club</td>
		<td class="col-xm-4 col-sm-2">Categoría</td>
		<td class="col-xm-4 col-sm-2">Vigencia del Concurso</td>
		<td class="col-xm-4 col-sm-2">Fecha de Solicitud</td>
		<td class="col-xm-4 col-sm-1">Participantes</td>
		<td class="col-xm-4 col-sm-1">Estatus</td>
	</tr>
<?php foreach($competitions as $competition): ?>	
	<tr class="row">
		<td class="col-sm-4 col-sm-2"><?php echo $competition->name;?></td>
		<td class="col-sm-4 col-sm-2"><?php echo Helpers_Competitions::club($competition->fk_club); ?></td>
		<td class="col-sm-4 col-sm-2"><?php echo $competition->category; ?></td>
		<td class="col-sm-4 col-sm-2">
			<?php echo Helpers_Dates::getMonth($competition->init_date); ?> <br>
			<?php echo Helpers_Dates::getMonth($competition->finish_date); ?>
		</td>
		<td class="col-sm-4 col-sm-2"><?php echo Helpers_Dates::getMonth($competition->date); ?></td>
		<td class="col-sm-4 col-sm-1">50</td>
		<td class="col-sm-4 col-sm-1">
			<?php 
				$classes = '';
				switch ($competition->status) {
					case 'Pendiente':
							$classes = 'flaticon-chronometer yellow';
						break;
					case 'Activo':
							$classes = 'flaticon-check12 blue';
						break;
					case 'Rechazado':
							$classes = 'flaticon-close7 red';
						break;
					default:
						# code...
						break;
				}
			?>
			<span class="<?php echo $classes; ?>" onclick="approve('<?php echo URL::base(); ?>administrator/competitions/detail/<?php echo $competition->id_competition; ?>');"></span>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $pagination; ?>
</main>
<!-- Large modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content modalLarge">
		</div>
	</div>
</div>