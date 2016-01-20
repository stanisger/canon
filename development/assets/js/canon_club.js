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

$(document).ready(function() {
	/** Clean MODAL **/
	$('body').on('hidden.bs.modal', '.modal', function () {
	  $(this).removeData('bs.modal');
	});
});