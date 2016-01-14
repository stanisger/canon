<section class="head">
	<div class="contentHead">
		<h2>Clubes</h2>
		<button data-toggle="modal" data-target="#myModal1" href="<?php echo URL::base();?>administrator/clubs/add"> <span class="flaticon-users82"></span>Inscribir Club</button>
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
		<td class="col-xs-2">Nombre del Club</td>
		<td class="col-xs-2">Localidad</td>
		<td class="col-xs-2">Miembros Registrados</td>
		<td class="col-xs-2">Concursos Activos</td>
		<td class="col-xs-2">Concuros por Aprobar</td>
		<td class="col-xs-1">Editar</td>
		<td class="col-xs-1">Eliminar</td>
	</tr>
	<?php foreach($clubs as $club): ?>
	<tr class="row">
		<td class="col-xs-2"><?php echo $club->name; ?></td>
		<td class="col-xs-2"><?php echo $club->state; ?></td>
		<td class="col-xs-2">falta</td>
		<td class="col-xs-2">falta</td>
		<td class="col-xs-2">falta</td>
		<td class="col-xs-1"><span class="flaticon-pencil86" href="<?php echo URL::base(); ?>administrator/clubs/edit/<?php echo $club->id_club; ?>" data-toggle="modal" data-target="#myModal2"></span></td>
		<td class="col-xs-1"><span class="flaticon-close7" href="<?php echo URL::base(); ?>administrator/clubs/delete/<?php echo $club->id_club; ?>" data-toggle="modal" data-target="#myModal3"></span></td>
	</tr>
	<?php endforeach; ?>
</table>
<ul class="pagination">
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
</ul>
</main>
