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
		<td class="col-xs-1"><span class="flaticon-pencil86" onclick="edit_club('<?php echo URL::base(); ?>administrator/clubs/edit/<?php echo $club->id_club; ?>');"></span></td>
		<td class="col-xs-1"><span class="flaticon-close7" onclick="delete_club('<?php echo URL::base(); ?>administrator/clubs/delete/<?php echo $club->id_club; ?>');" ></span></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $pagination; ?>