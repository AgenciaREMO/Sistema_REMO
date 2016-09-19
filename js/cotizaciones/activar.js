var activardesc = function() {
	var concepto = document.getElementById("i-concepto");
	var detalles = document.getElementById("i-detalles");
	var costo = document.getElementById("i-costo");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	concepto.disabled = false;
	detalles.disabled = false;
	costo.disabled = false;
	editar.style.display = 'none';
	volver.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivardesc = function() {
	var concepto = document.getElementById("i-concepto");
	var detalles = document.getElementById("i-detalles");
	var costo = document.getElementById("i-costo");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	concepto.disabled = true;
	detalles.disabled = true;
	costo.disabled = true;
	editar.style.display = 'inline';
	volver.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};

var activarcon = function() {
	var categoria = document.getElementById("i-categoria");
	var concepto = document.getElementById("i-concepto");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = false;
	concepto.disabled = false;
	editar.style.display = 'none';
	volver.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivarcon = function() {
	var categoria = document.getElementById("i-categoria");
	var concepto = document.getElementById("i-concepto");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = true;
	concepto.disabled = true;
	editar.style.display = 'inline';
	volver.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};





var activarelemento = function() {
	var seccion = document.getElementById("i-seccion");
	var descripcion = document.getElementById("i-descripcion");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	seccion.disabled = false;
	descripcion.disabled = false;
	editar.style.display = 'none';
	volver.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivarelemento = function() {
	var seccion = document.getElementById("i-seccion");
	var descripcion = document.getElementById("i-descripcion");
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	seccion.disabled = true;
	descripcion.disabled = true;
	editar.style.display = 'inline';
	volver.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};

var activarcot = function() {
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	var expedir = document.getElementById("e-expedir");
	var agregar = document.getElementById("agregar");

	$('#container-cotemp').find('input, textarea, button, select').prop('disabled', false);
	$("[id*=concepto]").prop('disabled', true);
	$("[class*=i-borrar]").css("display", "inline");

	agregar.style.display = 'inline';
	expedir.style.display = 'none';
	editar.style.display = 'none';
	volver.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivarcot = function() {	
	var cancelar = document.getElementById("e-cancelar");
	var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	var expedir = document.getElementById("e-expedir");
	var agregar = document.getElementById("agregar");

	$('#container-cotemp').find('input, textarea, button, select, anchor').prop('disabled', true);
	$("[class*=i-borrar]").css("display", "none");
	$('#e-editar').prop('disabled', false);
	$('#e-expedir').prop('disabled', false);

	agregar.style.display = 'none';
	expedir.style.display = 'inline';
	editar.style.display = 'inline';
	volver.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};
