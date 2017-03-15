function calcularPromedio(fila) {

	var calif1 = $('#calif_nota1_'+fila+'').val();
	var calif2 = $('#calif_nota2_'+fila+'').val();
	var calif3 = $('#calif_nota3_'+fila+'').val();

	console.log(calif1);
	console.log(calif2);
	console.log(calif3);
	
	var notaf = parseFloat(((calif1*0.3)+(calif2*0.3)+(calif3*0.4)).toFixed(2));

	$('#calif_notaf_'+fila+'').val(notaf);

	if (notaf <= 3.75) {
		$('#calif_notaf_'+fila+'').addClass('text-danger');
	}
	else{
		$('#calif_notaf_'+fila+'').addClass('text-success')
	}	
}

function actMenu(menu,submenu) {
	/**
	 * Funcion que permite mostrar los grupos para la opcion calificaciones
	 * @param  oper [carga el valor contenido en el atributo clase]
	 * @return {[type]}        [description]
	 */
	var oper = $('#'+menu).attr('class');
	if (oper == "cerrado") {
		$('#'+submenu).show('400');
		$('#'+menu).removeClass('cerrado').addClass('abierto');			
	}
	else{
		$('#'+submenu).hide('400');
		$('#'+menu).removeClass('abierto').addClass('cerrado');
	}
}

/*function submenu(nombre) {
	var menu = $('li#'+nombre).attr('id');
	var page = $('b#'+nombre).attr('id');

	if (menu == page) {
		$('li#'+nombre).addClass('active');
	};
}*/