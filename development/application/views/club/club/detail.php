<div class="modal-header">
	<button style="display:none" type="button" class="close" data-dismiss="modal" aria-label="Close">
	<button type="button" onclick="closeModal();" aria-label="Close">
	<span aria-hidden="true" class="flaticon-forbidden15"></span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Perfil de Club</h4>
</div>
<div class="modal-body profileClub row">
	<article class="col-sm-3">
		<!--  <a class="flaticon-pencil86" href="#">
					<input type="file" name="upload">
		</a> -->
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
		<p><?php echo $club->name; ?></p>
	</article>
	<article class="col-sm-4">
		<label for="nameClub">Matrícula del Club<sup>*</sup></label>
		<p><?php echo $club->enrollment; ?></p>
	</article>
	<div class="contentProfile col-xs-12">
		<label for="textOne" class="col-xs-12">Descripción <sup>*</sup></label>
		<p><?php echo $club->description; ?> </p>
		<label for="textTwo" class="col-xs-6">Nombre de Contacto <sup>*</sup></label>
		<label for="textThree" class="col-xs-6">E-mail de contacto<sup>*</sup></label>
		<p><?php echo $club->name_contact;  ?></p>
		<p><?php echo $club->email; ?></p>
		<label for="textFour" class="col-xs-12">Contraseña <sup>*</sup></label>
		<p> <?php echo Helpers_Encrypt::decrypt($club->password); ?></p>
		<label for="textFour" class="col-xs-12">Teléfono <sup>*</sup></label>
		<label for="textFive" class="col-xs-12">Estado de la Republica  <sup>*</sup></label>
		<p><?php echo $club->phone; ?></p>
		<p><?php echo $club->state; ?></p>
	</div>
</div>
<div class="modal-footer">
	<button type="button" onclick="perfil('<?php echo URL::base(); ?>club/club/edit',1);" class="btn btn-primary">
	Editar Perfil</button>
</div>