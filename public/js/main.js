/*=========== Rutas base ===========*/
var base_url = 'http://localhost/anav_siac/';

/*=========== Rutas de busqueda ===========*/
var userSearch = base_url+'admin/busquedaUsuarios';
var userSearchStudent = base_url+'admin/busquedaEstudiantes';
/*=========================================*/

/*=========== Rutas validar duplicados ===========*/	
var userExist  = base_url+'admin/existenciaUsuario';
var existenciaAsig  = base_url+'assignment/validarAsig';
var existenciagroup = base_url+'group/validarGrupo';
/*================================================*/

/*=========== Rutas grupos y materias dependiendo del programa ===========*/	
var asigProg  = base_url+'assignment/validarProg';
/*================================================*/

$(document).ready(function() {

	$('#col2, #col3, #col4').css('display', 'none');			
	$('#requerido').text('*');

	/**
	 * Inicializar componentes de bootstrap
	 */
	$('#login_form').validator();
	$('.btn').tooltip();
	$('#myModal').modal();
	$('.collapse').collapse();
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$('.fecha').datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2025"
	});

	/**
	 * Carga los contenedores de los sub formularios dependiendo del valor de un campo
	 * @param  var tius [almacena el valor del campo tipo_usuario]
	 */
	$('.contenedor-principal').on('change', '#form-add #tipo_usuario', function(event) {
		event.preventDefault();
		var tius = $('#form-add #tipo_usuario').val();
		switch(tius) {
			case 'ADMIN':
				$('#col2').fadeIn('slow');
				$('#col3').css('display', 'none');
				$('#col4').css('display', 'none');
				break;
			case 'INST':
				$('#col3').fadeIn('slow');
				$('#col2').css('display', 'none');
				$('#col4').css('display', 'none');
				break;
			case 'DIREC':
				$('#col4').fadeIn('slow');
				$('#col2').css('display', 'none');
				$('#col3').css('display', 'none');
				break;
			default:
				$('#tius .help-block .with-errors').css('display', 'block').text('Debe seleccionar un tipo de usuario');
				break;
		}
	});

	/**
	 * Coloca los campos requeridos
	 */
	$('input[required=required], select[required=required], textarea[require=required').parent().parent().append('<div class="col-sm-1 text-danger" id="requerido">*</div>');

	/**
	 * Coloca el valor todos los campos texto en mayúsculas
	 */	
	$('body').on('blur', '#form-add  input[type=text], #upd-form input[type=text]', function(event) {
		event.preventDefault();
		$(this).css('text-transform', 'uppercase');
		this.value = this.value.toLocaleUpperCase();
	});

	/**
	 * Esta funcion permite hacer la busqueda de usuarios
	 * @param  var datoBusqueda [Aqui se alamcena el dato que se va utilizar pa realizar la busqueda]
	 * @return Retona los registros relacionados a los datos de consulta
	 */
	$('body').on('click', '#searchUsers', function(event) {
		event.preventDefault();
		var datoBusqueda = $('#busquedaDato').val();

		$.ajax({
		  	url: userSearch,
		  	type: 'POST',
		  	data:{dato: datoBusqueda},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#info_content').html(data);
		}).error(function(data) {
		  		$('#info_content').html(data);
		});		
	});

	/**
	 * Esta funcion permite hacer la busqueda de estudientes
	 * @param  var datoBusqueda [Aqui se alamcena el dato que se va utilizar pa realizar la busqueda]
	 * @return Retona los registros relacionados a los datos de consulta
	 */
	$('body').on('click', '#searchStudents', function(event) {
		event.preventDefault();
		var datoBusqueda = $('#busquedaDatoEst').val();

		$.ajax({
		  	url: userSearchStudent,
		  	type: 'POST',
		  	data:{dato: datoBusqueda},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#search_student #info_content').html(data);
		}).error(function(data) {
		  		$('#search_student #info_content').html(data);
		});
	});

	/**
	 * [Valida la existencia del usuario]
	 * @param  var datoExistencia [Alamcena el # de docuemnto del usuario a ingresar] 
	 * @return Retorna un mensaje resultante despues de realizada la consulta
	 */
	$('body').on('blur', '#form-add #usua_doc', function(event) {
		event.preventDefault();
		 var datoExistencia = $('#usua_doc').val();
		
		$.ajax({
		  	url: userExist,
		  	type: 'POST',
		  	data:{dato: datoExistencia},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#form-add #menssage').html(data);
		  		$('#menssage').delay(1200).fadeOut(1000);
		}).error(function(data) {
		  		$('#form-add #menssage').html(data);
		  		$('#menssage').delay(1200).fadeOut(1000);
		});
	});

	var userType = $('#upd-form #tipo_usuario' ).val();
	switch(userType) {
		case 'ADMIN':
			$('#form-upd #col2').css('display', 'block');
			break;
		case 'INST':
			$('#form-upd #col3').css('display', 'block');
			break;
		case 'DIREC':
			$('#form-upd #col4').css('display', 'block');
			break;
	}

	/**
	 * [Evento que se ejecuta cada vez que se vaya a eliminar un registro]
	 * @param  [bolean] $cnf [alamcena un valor boleano ]
	 * @return [redirecciones a diferentes url's para ejecutar el query de eliminar registro ]
	 */
	$('table.table').on('click', '.btn-delete', function(event) {
		event.preventDefault();

		$cnf = confirm("¿Realmente desea eliminar este registro?");

		if ($cnf == true) {

			$uid = $(this).attr("data-id");
			$grupo = $(this).attr("data-grupo");
			$estu = $(this).attr("data-estu");
			$rol = $(this).attr("data-rol");

			switch($rol) {

				case 'admin':
					window.location.replace(base_url+'user/dltUser/'+$uid+'/admin');
					break;

				case 'inst':
					window.location.replace(base_url+'user/dltUser/'+$uid+'/inst');
					break;

				case 'direc':
					window.location.replace(base_url+'user/dltUser/'+$uid+'/direc');
					break;

				case 'estu':
					window.location.replace(base_url+'student/dltStud/'+$uid+'/'+$grupo);
					break;

				case 'matricula':
					window.location.replace(base_url+'enrollment/dltEnroll/'+$uid+'/'+$estu+'/'+$grupo);
					break;

				case 'group':
					window.location.replace(base_url+'group/dltGroup/'+$uid+'/'+$grupo);
					break;

				case 'subj':
					window.location.replace(base_url+'subject/dltSubj/'+$uid+'/'+$grupo);
					break;			

				case 'asig':
					window.location.replace(base_url+'assignment/dltAsig/'+$uid+'/'+$grupo);
					break;
					
				default:
					alert('No se puede eliminar el registro');
					break;
			}				
		};
	});

	/**
	 * [Evento con el cual se puede formar el nombre del grupo]
	 * @param [semestre] {almacena el dato ingresado en el campo semestre} 
	 * @param [anio] 	 {almacena el valor del año ingresado en el campo}
	 * @param [grupo] 	 {almacena el valor elegido en el select de programas}
	 * @return nombre del grupo concatenado
	 */
	$('body').on('blur', '.grupo', function(event) {
		event.preventDefault();
		var semestre = $('#semestre').val();  	
		var anio 	 = $('#grupo_anio').val();
		var grupo 	 = $('#grupo_idprog').val();

		if (grupo==1){
			var codigo = 'TLA_'+semestre+anio;
			var nombre = 'TLA_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre').val(nombre);
			$('#grupo_codigo').val(codigo);
			$('#grupo_nombre').val(nombre);
		};
		if (grupo==2) {
			var codigo = 'DPA_'+semestre+anio;
			var nombre = 'DPA_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre').val(nombre);
			$('#grupo_codigo').val(codigo);
			$('#grupo_nombre').val(nombre);
		};
		if (grupo==3) {
			var codigo = 'ASA_'+semestre+anio;
			var nombre = 'ASA_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre').val(nombre);
			$('#grupo_codigo').val(codigo);
			$('#grupo_nombre').val(nombre);
		};

		$.ajax({
		  	url: existenciagroup,
		  	type: 'POST',
		  	data:{dato: codigo},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#menssage').html(data);
		  		$('#menssage').delay(1200).fadeOut(1000);		  		
		}).error(function(data) {
		  		$('#menssage').html(data);
		  		$('#menssage').delay(1200).fadeOut(1000);
		});		
	});

	/**
	 * [Evento que permite cargar el # de semestres dependiendo del valor que arroje el select de programa ]
	 * @param  [var prog] {Almacena el valor seleccionado en el capo de programna}
	 * @return --
	 */
	$('body').on('click', '#grupo_idprog', function(event) {
		event.preventDefault();
		var prog = $('#grupo_idprog').val();
		console.log(prog);
		if (prog == 1) {
			$('#semestre .dpa').css('display', 'block');
			$('#semestre .asa').css('display', 'block');
		};
		if (prog == 2) {
			$('#semestre .dpa').css('display', 'none');
		};
		if (prog == 3) {
			$('#semestre .dpa').css('display', 'block');
			$('#semestre .asa').css('display', 'none');
		};
	});

	/**
	 * [Evento con el cual se puede formar el nombre de la materia]
	 * @param [semestre] {almacena el dato ingresado en el campo semestre} 
	 * @param [anio] 	 {almacena el valor del año ingresado en el campo}
	 * @param [grupo] 	 {almacena el valor elegido en el select de programas}
	 * @return nombre de la materia concatenado
	 */
	$('body').on('blur', '.materia', function(event) {
		event.preventDefault();
		var semestre = $('#semestre').val();  	
		var nom_materia = $('#nombre').val();  	
		var grupo 	 = $('#mate_idprog').val();

		if (grupo==1){
			var codigo = nom_materia+'_TLA';
			var nombre = nom_materia+'_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre-materia').val(nombre);
			$('#mate_codigo').val(codigo);
			$('#mate_nombre').val(nombre);
		};
		if (grupo==2) {
			var codigo = nom_materia+'_DPA';
			var nombre = nom_materia+'_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre-materia').val(nombre);
			$('#mate_codigo').val(codigo);
			$('#mate_nombre').val(nombre);
		};
		if (grupo==3) {
			var codigo = nom_materia+'_ASA';
			var nombre = nom_materia+'_'+semestre;
			$('#codigo').val(codigo);
			$('#nombre-materia').val(nombre);
			$('#mate_codigo').val(codigo);
			$('#mate_nombre').val(nombre);
		};		
	});

	/**
	 *  Esta sección permite a los campos nombre y semestre los cargar valores que estan almacenados
	 *  en dos input[type=hidden]
	 */
	var dato0 = $('#dato0').val();
	var dato1 = $('#dato1').val();
	$('#form-upd #nombre').val(dato0);
	if (dato1 == 'I') {
		$('#form-upd #semestre>option[value=I]').attr('selected', 'selected');
	};
	if (dato1 == 'II') {
		$('#form-upd #semestre>option[value=II]').attr('selected', 'selected');
	};
	if (dato1 == 'III') {
		$('#form-upd #semestre>option[value=III]').attr('selected', 'selected');
	};
	if (dato1 == 'IV') {
		$('#form-upd #semestre>option[value=IV]').attr('selected', 'selected');
	};

	/**
	 * [Evento que permite cargar el # de semestres dependiendo del valor que arroje el select de programa ]
	 * @param  [var prog] {Almacena el valor seleccionado en el capo de programna}
	 * @return --
	 */
	$('body').on('click', '#mate_idprog', function(event) {
		event.preventDefault();
		var prog = $('#mate_idprog').val();
		if (prog == 1) {
			$('#semestre .dpa').css('display', 'block');
			$('#semestre .asa').css('display', 'block');
		};
		if (prog == 2) {
			$('#semestre .dpa').css('display', 'none');
		};
		if (prog == 3) {
			$('#semestre .dpa').css('display', 'block');
			$('#semestre .asa').css('display', 'none');
		};
	});

	/**
	 * Esta funcion ajax se utiliza para cargar los selects dependiendo del valor almacenado en programa
	 * @param  var programa [Almacena el valor seleccionado en el campo asig_idprog]
	 * @return Vista que permite cargar los selects
	 */
	$('body').on('click', '#form-add #asig_idprog', function(event) {
		event.preventDefault();
		var programa = $('#asig_idprog').val();

		$.ajax({
		  	url: asigProg,
		  	type: 'POST',
		  	data:{dato: programa},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#content-info').html(data);
		}).error(function(data) {
		  		$('#content-info').html(data);
		});
	});

	/**
	 * Esta funcion ajax se utiliza para cargar los selects dependiendo del valor almacenado en programa
	 * @param  var programa [Almacena el valor seleccionado en el campo asig_idprog]
	 * @return Vista que permite cargar los selects
	 */
	$('body').on('blur', '#form-add #asig_idmate', function(event) {
		event.preventDefault();
		var grupo = $('#asig_idgrupo').val();
		var materia = $('#asig_idmate').val();

		$.ajax({
		  	url: existenciaAsig,
		  	type: 'POST',
		  	data:{group: grupo, subject: materia},
		  	dataType: 'text'		  	
		}).done(function(data) {
		  		$('#menssage').html(data);	
		  		$('#menssage').delay(1200).fadeOut(1000);	  		
		}).error(function(data) {
		  		$('#menssage').html(data);
		  		$('#menssage').delay(1200).fadeOut(1000);
		});
	});

	/**
	 * Bloque de codigo que me permite tener abierto el submenu de calificaciones mientras cuando el atributo clase del padre sea active
	 * @type {[type]}
	 */
	var actIns = $('#inscritos').parent().attr('class');
	if (actIns == "active") {
		$('#prog_inscritos').css('display', 'block');;
	};	
	
	var actMat = $('#matriculas').parent().attr('class');
	if (actMat == "active") {
		$('#grupo_matriculas').css('display', 'block');;
	};

	var actCalif = $('#grupos').parent().attr('class');
	if (actCalif == "active") {
		$('#prog_grupos').css('display', 'block');;
	};

	var actIns = $('#materias').parent().attr('class');
	if (actIns == "active") {
		$('#prog_materias').css('display', 'block');;
	};	
	
	var actMat = $('#asignaciones').parent().attr('class');
	if (actMat == "active") {
		$('#prog_asig').css('display', 'block');;
	};

	var actCalif = $('#calificaiones').parent().attr('class');
	if (actCalif == "active") {
		$('#grupo_calificaiones').css('display', 'block');;
	};

	var actCalif = $('#estudiantes').parent().attr('class');
	if (actCalif == "active") {
		$('#grupo_estudiantes').css('display', 'block');;
	};

	/**
	 * bloque de codigo que permite cambiar el color de la nota final
	 * @type {[type]}
	 */
	var notaFinal = $('.calif_notaf').val();
	if (notaFinal <= 3.75) {
		$('.calif_notaf').addClass('text-danger');
	}
	else{
		$('.calif_notaf').addClass('text-success')
	}	
});