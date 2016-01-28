var closeModal = function(){    
    $('.modal-content').html('');
    $('.close').trigger('click');
}


var sendForm = function(){
	$('form#edit_perfil').submit(function(event) {
				event.preventDefault();

				var password = $('#password').val();
				var repit_password = $('#repit_password').val();
				if(password != repit_password){
					alert('Las contraseñas no coinciden');
				}else{
					var url  = $(this).attr('action');
					var inputFileImage = document.getElementById("avatar").files[0];
					var formElement = document.getElementById("edit_perfil");

					var data = new FormData();
					data.append('name',$('input[name="name"]').val());
					data.append('description',$('input[name="description"]').val());
					data.append('email',$('input[name="email"]').val());
					data.append('password',$('input[name="password"]').val());
					data.append('repit_password',$('input[name="repit_password"]').val());
					data.append('phone',$('input[name="phone"]').val());
					data.append('state',$('input[name="state"]').val());
					data.append('avatar',inputFileImage);
					
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
					        	location.reload();
					        }   
					    }
					});
				}
			});
}


var edit_perfil = function(path){
	$('.modal-content').html('');
	$('#myModal2').modal({
		remote  : path,
	});
	$('#myModal2').on('loaded.bs.modal', function (e) {		
		$('#myModal').css('display','none');
		$('#myModal2').css('display','block');
		sendForm();
	});
}



var uploadImage = function(id_competition){
	window.location = URL+'member/competitions/upload/'+id_competition;
}

var addUploadImage = function(id_competition){
	var num = $('.dowloadPhoto').length + 1;
	$.post(URL+'member/photographs/upload',{id_competition:id_competition,num:num},function(response){

		$('.addPhoto').before(response);
		$('.addPhoto').remove();
		//$('#form_uploads').append(response);
	});
}


var prev_submit = function(){
	$('#submit_upload_gallery').trigger('click');
}


$(document).ready(function() {
    /** Clean MODAL **/
    $('body').on('hidden.bs.modal', '.modal', function () {
      $(this).removeData('bs.modal');
    });


    $('#filter_my_gallery').change(function(){
    	var id_club = $(this).val();
    	if(0 < parseInt(id_club))
    		window.location = URL+'member/photographs/index/'+id_club;
    });
});