
var closeModal = function(){
		$('.close').trigger('click');
		$('.modal-content').html('');
	}

/**CLUBS **/

var searchClubs = function(){
	var column  = $('#ordenClubs').val();
	var keyword = $('#keyword').val();
	$.post(URL+'administrator/clubs/index',{page:1,column:column,keyword:keyword},function(response){
			$('main').html(response);
		});
}

var page = function(){
	var url = window.location.pathname;
	var split = url.split('/');
	return  split.pop();
}
var reloadClubs = function(){
	$.post(URL+'administrator/clubs/index/',{page:page()},function(response){
		$('main').html(response);
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
					var formElement = document.getElementById("add_club");

					var data = new FormData();
					data.append('name',$('input[name="name"]').val());
					data.append('enrollment',$('input[name="enrollment"]').val());
					data.append('description',$('textarea[name="description"]').val());
					data.append('name_contact',$('input[name="name_contact"]').val());
					data.append('email',$('input[name="email"]').val());
					data.append('password',$('input[name="password"]').val());
					data.append('repit_password',$('input[name="repit_password"]').val());
					data.append('phone',$('input[name="phone"]').val());
					data.append('state',$('select[name="state"]').val());
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
					        	reloadClubs();
					        	closeModal();
					        	
					        }   
					    }
					});
				}
			});
}

var edit_club = function(path){
	$('#myModal1').modal({
		remote  : path,
	});
	$('#myModal1').on('loaded.bs.modal', function (e) {		
		sendFormClubs();
	});
}

var delete_club = function(path){
	$('#myModal2').modal({
		remote  : path,
	});
	$('#myModal2').on('loaded.bs.modal', function (e) {		
		$('.confirm_delete_club').click(function(event) {
			var primary_key = $(this).attr('id');
			$.post(URL+'administrator/clubs/delete/'+primary_key,{},function(response){
				alert(response);
				reloadClubs();
				closeModal();
			});
		});
	});
}
/** END CLUBS **/


/** competitions */
var approve = function(path){
	$('#myModal3').modal({
		remote  : path,
	});
	$('#myModal1').on('loaded.bs.modal', function (e) {		
		
	});
}


var changeStatusCompetition = function(id_competition,status){
	$.post(URL+'administrator/competitions/status',{id_competition:id_competition,status:status},function(){
		location.reload();
	});
}
/** end competitions */

$(document).ready(function() {

	/** Clean MODAL **/
	$('body').on('hidden.bs.modal', '.modal', function () {
	  $(this).removeData('bs.modal');
	});

	/** ADD CLUB IN MODAL **/
	$('button#add_club').click(function(){
		$('#myModal1').modal({
			remote  : $(this).attr('href'),
		});
		$('#myModal1').on('loaded.bs.modal', function (e) {		
			sendFormClubs();
		})
	});

	

});