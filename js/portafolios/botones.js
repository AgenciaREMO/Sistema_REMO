var aportada = function() {
	//var concepto = document.getElementById("i-concepto");
	//var detalles = document.getElementById("i-detalles");
	var portada = document.getElementById("r-portada");
	var cancelar = document.getElementById("c-portada");
	var guardar = document.getElementById("g-portada");
	var editar = document.getElementById("e-portada");
	portada.disabled = false;
	//detalles.disabled = false;
	//costo.disabled = false;
	editar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};


var dportada = function() {
	/*var concepto = document.getElementById("i-concepto");
	var detalles = document.getElementById("i-detalles");*/
	var portada = document.getElementById("r-portada");
	var cancelar = document.getElementById("c-portada");
	//var volver = document.getElementById("e-volver");
	var guardar = document.getElementById("g-portada");
	var editar = document.getElementById("e-portada");
	portada.disabled = true;
	/*detalles.disabled = true;
	costo.disabled = true;*/
	editar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};