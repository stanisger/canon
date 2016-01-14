<section class="head">
	<div class="contentHead">
		<h2>Clubes</h2>
		<button data-toggle="modal" data-target="#myModal2" href="<?php echo URL::base();?>administrator/clubs/add"> <span class="flaticon-users82"></span>Inscribir Club</button>
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
	<tr class="row">
		<td class="col-xs-2">Cuarto Obscuro</td>
		<td class="col-xs-2">Guadalajara</td>
		<td class="col-xs-2">30</td>
		<td class="col-xs-2">2</td>
		<td class="col-xs-2">0</td>
		<td class="col-xs-1"><span class="flaticon-pencil86" href="<?php echo URL::base(); ?>administrator/clubs/edit" data-toggle="modal" data-target="#myModal"></span></td>
		<td class="col-xs-1"><span class="flaticon-close7" data-toggle="modal" data-target=".bs-example-modal-sm"></span></td>
	</tr>
	<tr class="row">
		<td class="col-xs-2">Cuarto Obscuro</td>
		<td class="col-xs-2">Guadalajara</td>
		<td class="col-xs-2">30</td>
		<td class="col-xs-2">2</td>
		<td class="col-xs-2">0</td>
		<td class="col-xs-1"><span class="flaticon-pencil86" href="<?php echo URL::base(); ?>administrator/clubs/edit" data-toggle="modal" data-target="#myModal"></span></td>
		<td class="col-xs-1"><span class="flaticon-close7" data-toggle="modal" data-target=".bs-example-modal-sm"></span></td>
	</tr>
</table>
<ul class="pagination">
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
</ul>
</main>
<!-- Modal 1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content modalclubesBody">
			
		</div>
	</div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content modalclubesBody">
			
		</div>
	</div>
</div>