<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true" class="flaticon-forbidden15"></span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Inscribir Club</h4>
</div>
<form action="<?php echo URL::base(); ?>administrator/clubs/add" method="POST" id="add_club" enctype="multipart/form-data">
	<div class="modal-body profileClub row">
		<article class="col-sm-3">
			<a class="flaticon-arrow68 upload" href="#">
				<input type="file" name="upload" id="logotipo">
			</a>
			<figure>
				<img src="<?php echo URL::base(); ?>assets/images/generic.png" alt="">
			</figure>
		</article>
		<article class="col-sm-5">
			<label for="nameClub">Nombre del Club <sup>*</sup></label>
			<input   type="text" placeholder="Nombre del Club" name="name">
		</article>
		<article class="col-sm-4">
			<label for="nameClub">Matrícula del Club</label>
			<input   type="text" placeholder="Matrícula" name="enrollment">
		</article>
		<div class="contentProfile col-xs-12">
			<label for="textOne" class="col-xs-12">Descripción <sup>*</sup></label>
			<textarea  name="description" id="textOne" rows="10" placeholder="Ingresa breve descripción sobre el Club"></textarea>
			<label for="textTwo" class="col-xs-6">Nombre de Contacto <sup>*</sup></label>
			<label for="textThree" class="col-xs-6">E-mail de contacto<sup>*</sup></label>
			<input   type="text" name="name_contact" class="col-xs-6" placeholder="Nombre">
			<input   type="email" name="email"  class="col-xs-6"placeholder="Email">
			<label for="textFour" class="col-xs-11">Contraseña <sup>*</sup></label>
			<input   type="password" name="password"  id="password" placeholder="•••••••">
			<label for="textFour" class="col-xs-11">Repetir Contraseña <sup>*</sup></label>
			<input   type="password" name="repit_password"  id="repit_password" placeholder="Nueva Contraseña">
			<label for="textFour" class="col-xs-12">Teléfono <sup>*</sup></label>
			<label for="textFour" class="col-xs-12">Estado de la Republica  <sup>*</sup></label>
			<input   type="telephone" name="phone"  placeholder="Télefono">
			<select  required name="state" id="estado">
				<option value=""> Estado de la República</option>
				<?php foreach($states as $state): ?>
					<option value="<?php echo $state->name; ?>" ><?php echo $state->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" >Cancelar</button>
		<button type="submit" class="btn btn-primary" >Crear Club</button>
	</div>
</form>
<script>
	$(document).ready(function() {
		$('form#add_club').submit(function(event) {
			event.preventDefault();

			var password = $('#password').val();
			var repit_password = $('#repit_password').val();
			if(password != repit_password){
				alert('Las contraseñas no coinciden');
			}else{
				var url  = $(this).attr('action');
				var inputFileImage = document.getElementById("logotipo").files[0];
				var formElement = document.getElementById("add_club");

				var data = new FormData(formElement);
				data.append('logotipo',inputFileImage);
				
				$.ajax({
				    url: url,
				    data: data,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				        alert(data.message);
				        
				    }
				});
			}
		});
	});
</script>