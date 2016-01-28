<section class="head">
	<div class="contentHead">
		<h2>Miembros</h2>
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
		<td>Matrícula</td>
		<td>Miembro</td>
		<td>Localidad</td>
		<td>Fecha de ingreso</td>
		<td>Estatus</td>
	</tr>
	<?php foreach($members as $member): ?>
	<tr class="row <?php echo ('Rechazado' == $member->status)?'activeEnd':''; ?>">
		<td ><?php echo $member->enrollment; ?></td>
		<td><?php echo $member->name; ?></td>
		<td><?php echo $member->state; ?></td>
		<td><?php echo Helpers_Dates::getMonth($member->d); ?></td>
		<td>

			<span class="flaticon-check12 <?php echo ('Activo' == $member->status)?'activeStatus':''; ?>" ></span>
			<span class="flaticon-close7 <?php echo ('Rechazado' == $member->status)?'activeStatus':''; ?>" ></span>
			<span class="flaticon-chronometer <?php echo ('Pendiente' == $member->status)?'activeStatus':''; ?>" ></span>
			<span class="flaticon-pencil86 <?php echo ('xxx' == $member->status)?'activeStatus':''; ?>" ></span>
		</td>
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