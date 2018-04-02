$(document).ready(function(){

	$('#new-number').click(function(){	
		$('#modal-new-number-form').submit();
	});

	$('#edit-number').click(function(){
		$id = $('[name="edit_number_id"]').val();
		$.ajax({
			headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
			url: 'administracao/update/'+$id,
			type: 'post',
			data: {
				'type_id': $('#edit_type_id').val(),
				'value': $('#edit_number_value').val(),
			},
			success: function(data){
				window.location.reload();
			}
		});
	});

});


function removeNumber($id){
	$.ajax({
		headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
		url: 'administracao/delete/'+$id,
		type: 'get',
		success: function(data){
			window.location.reload();
		}
	});
};

function editNumber($id, $typeId, $value){
	$('#edit_type_id').val($typeId);
	$('#edit_number_value').val($value);
	$('[name="edit_number_id"]').val($id);

	console.log($id, $('[name="edit_number_id"]').val())

}
