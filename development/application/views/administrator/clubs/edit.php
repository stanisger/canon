<div class="modal-header">
	<button style="display:none" type="button" class="close" data-dismiss="modal" aria-label="Close">
	<button type="button" onclick="closeModal();" aria-label="Close">
	<span aria-hidden="true" class="flaticon-forbidden15"></span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Editar Club</h4>
</div>
<form action="<?php echo URL::base(); ?>administrator/clubs/edit/<?php echo $club->id_club; ?>" method="POST" id="edit_club" enctype="multipart/form-data">
	<div class="modal-body profileClub row">
		<article class="col-sm-3">
			<a class="flaticon-pencil86" href="#">
				<input type="file" name="logotipo" id="logotipo">
			</a>
			<figure>
				<?php if('' == $club->logotipo): ?>
				<img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
				<?php else: ?>
				<img src="<?php echo URL::base(); ?>assets/images/clubs/<?php echo $club->logotipo; ?>" alt="">
				<?php endif; ?>
			</figure>
		</article>
		<article class="col-sm-5">
			<label for="nameClub">Nombre del Club <sup>*</sup></label>
			<input required type="text" placeholder="Nombre del Club" name="name" value="<?php echo $club->name; ?>">
		</article>
		<article class="col-sm-4">
			<label for="nameClub">Matrícula del Club<sup>*</sup></label>
			<input required type="text" placeholder="Matrícula" name="enrollment" value="<?php echo $club->enrollment; ?>">
		</article>
		<div class="contentProfile col-xs-12">
			<label for="textOne" class="col-xs-12">Descripción <sup>*</sup></label>
			<textarea name="description" id="textOne" rows="10"><?php echo $club->description; ?></textarea>
			<label for="textTwo" class="col-xs-6">Nombre de Contacto <sup>*</sup></label>
			<label for="textThree" class="col-xs-6">E-mail de contacto<sup>*</sup></label>
			<input required type="text" name="name_contact" class="col-xs-6" placeholder="Nombre" value="<?php echo $club->name_contact; ?>">
			<input required type="email" name="email"  class="col-xs-6" placeholder="Email" value="<?php echo $club->email; ?>">
			<label for="textFour" class="col-xs-12">Contraseña <sup>*</sup></label>
			<input type="password" name="password"  placeholder="•••••••">
			<label for="textFour" class="col-xs-12">Repetir Contraseña <sup>*</sup></label>
			<input type="password" name="repit_password"  placeholder="Nueva Contraseña">
			<label for="textFour" class="col-xs-12">Teléfono <sup>*</sup></label>
			<label for="textFive" class="col-xs-12">Estado de la Republica  <sup>*</sup></label>
			<input required type="telephone" name="phone"  placeholder="Télefono" value="<?php echo $club->phone; ?>">
			<select required name="state" id="estado">
				<option value=""> Estado de la República</option>
				<?php foreach($states as $state): ?>
				<option value="<?php echo $state->name; ?>" <?php echo ($club->state == $state->name)?'selected':''; ?>><?php echo $state->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" >Cancelar</button>
		<button type="submit" class="btn btn-primary" >Guardar Cambios</button>
	</div>
</form>
