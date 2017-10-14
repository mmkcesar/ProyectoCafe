var tabla;

// funcion que se ejecuta al inicio

function init(){
	mostrarFormulario(false);
	listar();

}

//Function Limpiar
funtion limpiar(){
	$("#idUsuario").val("");
	$("#nombre").val("");
	$("#apellidos").val("");
	$("#cedula").val("");
	$("#email").val("");
	$("#telefono").val("");
	$("#tipo").val("");
	$("#fecha").val("");
	$("#usuario").val("");
	$("#password").val("");
}

funtion mostrarFormulario(flag){
	limpiar();

	if(flag)
	{
		$("#limpiarRegistros").hide();
		$("#formularioRegistros").show();
		$("#btnGuardar").prop("disable",false);
	}else{
		$("#limpiarRegistros").show();
		$("#formularioRegistros").hide();
		//$("#btnGuardar").prop("disable",false);
	}
}

//funcion cancelar formulario
function cancelarForm(){
	limpiar();
	mostrarFormulario(false);
}


//funcion Listar
funtion listar()
{
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, //Paginacion y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos de control de tabla

		buttons:[
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
				],
		"ajax":
				{
					url: '../ajax/categoria.php?op=listar',
					type : "get",
					datatype : "json",
					error : funtion(e){
						console.log(e.responseText);
					}
				},
				"bDestroy":true,
				"iDisplayLength":5,//Paginacion
				"order":[[0, "desc" ]]  //order desendente por id

	}).DataTable();

}


init();