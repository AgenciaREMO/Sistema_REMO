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