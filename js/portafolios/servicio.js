var activarSer = function() {
	var servicio = document.getElementById("servicio");
	for (var i = 0; i < registros.length; i++) {
		
	}
	var descripcion = document.getElementById("descripcion");
	var cancelar = document.getElementById("s-cancelar");
	var guardar = document.getElementById("s-guardar");
	var editar = document.getElementById("s-editar");
	servicio.disabled = false;
	descripcion.disabled = false;
	editar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivarSer = function() {
	var servicio = document.getElementById("servicio");
	var descripcion = document.getElementById("descripcion");
	var cancelar = document.getElementById("s-cancelar");
	var guardar = document.getElementById("s-guardar");
	var editar = document.getElementById("s-editar");
	servicio.disabled = true;
	descripcion.disabled = true;
	editar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};

var activarPor = function() {
	var radiocheck = document.getElementById("id_img");
	var cancelar = document.getElementById("p-cancelar");
	var guardar = document.getElementById("p-guardar");
	var editar = document.getElementById("p-editar");
	var cargar = document.getElementById("p-nueva-s");
	var cargar2 = document.getElementById("p-nueva-n");
	radiocheck.disabled = false;
	editar.style.display = 'none';
	cargar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
	cargar2.style.display = 'inline';
};

var desactivarPor = function() {
	var radiocheck = document.getElementById("id_img");
	var cancelar = document.getElementById("p-cancelar");
	var guardar = document.getElementById("p-guardar");
	var editar = document.getElementById("p-editar");
	var cargar = document.getElementById("p-nueva-s");
	var cargar2 = document.getElementById("p-nueva-n");
	radiocheck.disabled = true;
	editar.style.display = 'inline';
	cargar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
	cargar2.style.display = 'none';
};