var closeModal = function(){
    $('.close').trigger('click');
    $('.modal-content').html('');
}

$(document).ready(function() {
    /** Clean MODAL **/
    $('body').on('hidden.bs.modal', '.modal', function () {
      $(this).removeData('bs.modal');
    });

});