var activarSer = function() {
	//var concepto = document.getElementById("i-concepto");
	//var detalles = document.getElementById("i-detalles");
	//var costo = document.getElementById("i-costo");
	var cancelar = document.getElementById("ser-cancelar");
	var guardar = document.getElementById("ser-guardar");
	var editar = document.getElementById("ser-editar");
	//concepto.disabled = false;
	//detalles.disabled = false;
	//costo.disabled = false;
	editar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};


var desactivarSer = function() {
	/*var concepto = document.getElementById("i-concepto");
	var detalles = document.getElementById("i-detalles");
	var costo = document.getElementById("i-costo");*/
	var cancelar = document.getElementById("ser-cancelar");
	//var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("ser-guardar");
	var editar = document.getElementById("ser-editar");
	/*concepto.disabled = true;
	detalles.disabled = true;
	costo.disabled = true;*/
	editar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};