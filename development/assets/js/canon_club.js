var closeModal = function(){
		$('.close').trigger('click');
		$('.modal-content').html('');
	}

var perfil = function(path,clean){
	if(1 == clean)
		$('#myModal').removeData('bs.modal');

	$('#myModal').modal({
		remote  : path,
	});
	$('#myModal').on('loaded.bs.modal', function (e) {		
		sendFormClubs();
	});
}


var sendFormClubs = function(){
	$('form#add_club, form#edit_club').submit(function(event) {
				event.preventDefault();

				var password = $('#password').val();
				var repit_password = $('#repit_password').val();
				if(password != repit_password){
					alert('Las contraseñas no coinciden');
				}else{
					var url  = $(this).attr('action');
					var inputFileImage = document.getElementById("logotipo").files[0];
					var formElement = document.getElementById("edit_club");

					var data = new FormData();
					data.append('name',$('input[name="name"]').val());
					data.append('description',$('textarea[name="description"]').val());
					data.append('password',$('input[name="password"]').val());
					data.append('repit_password',$('input[name="repit_password"]').val());
					data.append('logotipo',inputFileImage);
					
					$.ajax({
					    url: url,
					    data: data,
					    cache: false,
					    contentType: false,
					    processData: false,
					    type: 'POST',
					    success: function(data){
					        var dataParse = JSON.parse(data);
					        alert(dataParse.message);
					        if(true == dataParse.save){
					        	closeModal();					        	
					        }   
					    }
					});
				}
			});
}

var addJury = function (){
	var contents = parseInt($(".detailsJurado").length);
	console.log(contents);
	var next_content = contents + 1;
	var child = '<div class="col-sm-4 detailsJurado child'+next_content+'">'+
					'<label>Datos de Jurado</label>'+
					'<span class="flaticon-arrow68">'+
						'<input type="file" name="avatar_jury'+next_content+'">'+
						'<p id="cargarPic">Cargar Foto</p>'+
					'</span>'+
					'<div class="datesJurado col-6-sm">'+
						'<input type="text" name="name_jury[]" placeholder="Nombre completo*">'+
						'<input type="text" name="description_jury[]" placeholder="Descripción*">'+
						'<input type="text" name="url_jury[]" placeholder="URL del sitio (opcional)">'+
					'</div>'+
				'</div>';
	$('.child'+contents).after(child);
}


$(document).ready(function() {
	/** Clean MODAL **/
	$('body').on('hidden.bs.modal', '.modal', function () {
	  $(this).removeData('bs.modal');
	});


	$('#num_winners').keyup(function(event) {
		var winners = parseInt($(this).val()); var html = '';
		$('#cont_num_winners').html('');
		if(winners < 10){
			for(i=1;i<=winners;i++){
				console.log(i);
				var input = '<div class="winners col-sm-7 row">'+
							'<span class="flaticon-trophy36 col-sm-3"> <b>'+i+'</b></span>'+
							'<input class="col-sm-9" type="text" placeholder="Premio" name="winners[]">'+
						'</div>';
				html += input;
			}
			$('#cont_num_winners').html(html);
		}
	});



});