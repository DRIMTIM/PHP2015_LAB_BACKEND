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
	return false;

});

// Editar o Guardar por checkbox
$('#checkEdit').click(function(){

	if($('#checkEdit').prop('checked')){

		$('#editCat').removeAttr('disabled');		
		$('#submitCat').attr('disabled', 'disabled');

	}else{

		$('#submitCat').removeAttr('disabled');		
		$('#editCat').attr('disabled', 'disabled');

	}

});