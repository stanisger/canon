<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true" class="flaticon-forbidden15"></span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Editar Club</h4>
</div>
<div class="modal-body profileClub row">
	<article class="col-sm-3">
		<a class="flaticon-pencil86" href="#">
			<input type="file" name="upload">
		</a>
		<figure>
			<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
		</figure>
	</article>
	<article class="col-sm-5">
		<label for="nameClub">Nombre del Club <sup>*</sup></label>
		<input required type="text" placeholder="Nombre del Club">
	</article>
	<article class="col-sm-4">
		<label for="nameClub">Matrícula del Club<sup>*</sup></label>
		<input required type="text" placeholder="Matrícula">
	</article>
	<div class="contentProfile col-xs-12">
		<label for="textOne" class="col-xs-12">Descripción <sup>*</sup></label>
		<textarea name="textOne" id="textOne" rows="10"></textarea>
		<label for="textTwo" class="col-xs-6">Nombre de Contacto <sup>*</sup></label>
		<label for="textThree" class="col-xs-6">E-mail de contacto<sup>*</sup></label>
		<input required type="text" name="textTwo" class="col-xs-6" placeholder="Nombre">
		<input required type="email" name="textThree"  class="col-xs-6"placeholder="Email">
		<label for="textFour" class="col-xs-12">Contraseña <sup>*</sup></label>
		<input required type="text" name="textFour"  placeholder="•••••••">
		<label for="textFour" class="col-xs-12">Nueva Contraseña <sup>*</sup></label>
		<input required type="text" name="textFour"  placeholder="Nueva Contraseña">
		<label for="textFour" class="col-xs-12">Teléfono <sup>*</sup></label>
		<label for="textFive" class="col-xs-12">Estado de la Republica  <sup>*</sup></label>
		<input required type="telephone" name="textFive"  placeholder="Télefono">
		<select name="estado" id="estado">
			<option value="1" disiable> Estado de la República</option>
		</select>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	<button type="button" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>
</div>