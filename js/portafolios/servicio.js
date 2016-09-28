var activarPor = function() {
	var radio = document.getElementById("id_img");
	var editar = document.getElementById("p-editar");
	var cargar = document.getElementById("p-nueva-s");
	var cancelar = document.getElementById("p-cancelar");
	var guardar = document.getElementById("p-guardar");
	var cargar2 = document.getElementById("p-nueva-n");
	radio.disabled = false;
	editar.style.display = 'none';
	cargar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
	cargar2.style.display = 'inline';
};


var desactivarPor = function() {
	var radio = document.getElementById("id_img");
	var editar = document.getElementById("p-editar");
	var cargar = document.getElementById("p-nueva-s");
	var cancelar = document.getElementById("p-cancelar");
	var guardar = document.getElementById("p-guardar");
	var cargar2 = document.getElementById("p-nueva-n");
	radio.disabled = true;
	editar.style.display = 'inline';
	cargar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
	cargar2.style.display = 'none';
};

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


