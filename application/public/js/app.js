/***************************************

Archivo para realizar validaciones y 
funciones que generer algun efecto
visual o de algun otro tipo en la 
aplicacion cliente.

@autor: pelupotter

***************************************/

// Limpiar formulario de Categorias
$('#resetCat').click(function(){

	$('#nombre').val('');
	$('#desc').html(null);
	$('#idCat').hide();
	enableCatEdit()
	return false;

});

// Editar o Guardar
function enableCatEdit(){

	if($('#editCat').prop('disabled')){

		$('#editCat').removeAttr('disabled');		
		$('#submitCat').attr('disabled', 'disabled');

	}else{

		$('#submitCat').removeAttr('disabled');		
		$('#editCat').attr('disabled', 'disabled');

	}

}