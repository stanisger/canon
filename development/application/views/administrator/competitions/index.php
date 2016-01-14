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
	
	<tr class="row">
		<td class="col-sm-4 col-sm-2">Name</td>
		<td class="col-sm-4 col-sm-2">
			<b>Cuarto Oscuro</b>
		Guadalajara</td>
		<td class="col-sm-4 col-sm-2">Paisaje</td>
		<td class="col-sm-4 col-sm-2">
			10 de Enero <br>
			al 25 de Enero
		</td>
		<td class="col-sm-4 col-sm-2"> 2 de Enero</td>
		<td class="col-sm-4 col-sm-1">50</td>
		<td class="col-sm-4 col-sm-1">
			<span class="flaticon-chronometer yellow" href="<?php echo URL::base(); ?>administrator/competitions/detail/" data-toggle="modal" data-target=".bs-example-modal-lg"></span>
			<span class="flaticon-check12 blue" data-toggle="modal" data-target=".bs-example-modal-lg"></span>
			<span class="flaticon-close7 red" data-toggle="modal" data-target=".bs-example-modal-lg"></span>
		</td>
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
<!-- Large modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content modalLarge">
		</div>
	</div>
</div>