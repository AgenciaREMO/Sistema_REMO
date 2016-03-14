var activardesc = function() {
	var categoria = document.getElementById("i-categoria");
	var detalles = document.getElementById("i-detalles");
	var importe = document.getElementById("i-importe");
	var cancelar = document.getElementById("e-cancelar");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = false;
	detalles.disabled = false;
	importe.disabled = false;
	editar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivardesc = function() {
	var categoria = document.getElementById("i-categoria");
	var detalles = document.getElementById("i-detalles");
	var importe = document.getElementById("i-importe");
	var cancelar = document.getElementById("e-cancelar");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = true;
	detalles.disabled = true;
	importe.disabled = true;
	editar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};

var activarcon = function() {
	var categoria = document.getElementById("i-categoria");
	var concepto = document.getElementById("i-concepto");
	var cancelar = document.getElementById("e-cancelar");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = false;
	concepto.disabled = false;
	editar.style.display = 'none';
	cancelar.style.display = 'inline';
	guardar.style.display = 'inline';
};

var desactivarcon = function() {
	var categoria = document.getElementById("i-categoria");
	var concepto = document.getElementById("i-concepto");
	var cancelar = document.getElementById("e-cancelar");
	var guardar = document.getElementById("e-guardar");
	var editar = document.getElementById("e-editar");
	categoria.disabled = true;
	concepto.disabled = true;
	editar.style.display = 'inline';
	cancelar.style.display = 'none';
	guardar.style.display = 'none';
};

/*var activarcot = function() {
	var personal = document.getElementById("i-personal");
	var estatus = document.getElementById("i-estatus");
	var proyecto = document.getElementById("i-proyecto");
	var cliente = document.getElementById("i-cliente");
	var cantidad1 = document.getElementById("i-cantidad1");
	var concepto1 = document.getElementById("i-concepto1");
	var cdescripcion1 = document.getElementById("i-cdescripcion1");
	var costo1 = document.getElementById("i-costo1");
	var cantidad2 = document.getElementById("i-cantidad2");
	var concepto2 = document.getElementById("i-concepto2");
	var cdescripcion2 = document.getElementById("i-cdescripcion2");
	var costo2 = document.getElementById("i-costo2");
	var consideraciones = document.getElementById("i-consideraciones");
	var entregables = document.getElementById("i-entregables");
	var formaspago = document.getElementById("i-formaspago");
	var tiempoentrega = document.getElementById("i-tiempoentrega");
	var notas = document.getElementById("i-notas");
	var editar = document.getElementById("e-editar");
	var guardar = document.getElementById("e-guardar");
	var cancelar = document.getElementById("e-cancelar");
	var reutilizar = document.getElementById("e-reutilizar");

	var enviarmail = document.getElementById("e-mail");
	var descargar = document.getElementById("e-descargar");

	enviarmail.style.display = "none";
	descargar.style.display = "none";
	

	personal.disabled = false;
	estatus.disabled = false;
	proyecto.disabled = false;
	cliente.disabled = false;
	cantidad1.disabled = false;
	concepto1.disabled = false;
	cdescripcion1.disabled = false;
	costo1.disabled = false;
	cantidad2.disabled = false;
	concepto2.disabled = false;
	cdescripcion2.disabled = false;
	costo2.disabled = false;
	consideraciones.disabled = false;
	entregables.disabled = false;
	formaspago.disabled = false;
	tiempoentrega.disabled = false;
	notas.disabled = false;
	editar.disabled = true;
	guardar.disabled = false;
	cancelar.disabled = false;
	reutilizar.disabled = true;	
};

var desactivarcot = function() {
var personal = document.getElementById("i-personal");
	var estatus = document.getElementById("i-estatus");
	var proyecto = document.getElementById("i-proyecto");
	var cliente = document.getElementById("i-cliente");
	var cantidad1 = document.getElementById("i-cantidad1");
	var concepto1 = document.getElementById("i-concepto1");
	var cdescripcion1 = document.getElementById("i-cdescripcion1");
	var costo1 = document.getElementById("i-costo1");
	var cantidad2 = document.getElementById("i-cantidad2");
	var concepto2 = document.getElementById("i-concepto2");
	var cdescripcion2 = document.getElementById("i-cdescripcion2");
	var costo2 = document.getElementById("i-costo2");
	var consideraciones = document.getElementById("i-consideraciones");
	var entregables = document.getElementById("i-entregables");
	var formaspago = document.getElementById("i-formaspago");
	var tiempoentrega = document.getElementById("i-tiempoentrega");
	var notas = document.getElementById("i-notas");
	var editar = document.getElementById("e-editar");
	var guardar = document.getElementById("e-guardar");
	var cancelar = document.getElementById("e-cancelar");
	var reutilizar = document.getElementById("e-reutilizar");

	var enviarmail = document.getElementById("e-mail");
	var descargar = document.getElementById("e-descargar");

	enviarmail.style.display = "block";
	descargar.style.display = "block";

	personal.disabled = true;
	estatus.disabled = true;
	proyecto.disabled = true;
	cliente.disabled = true;
	cantidad1.disabled = true;
	concepto1.disabled = true;
	cdescripcion1.disabled = true;
	costo1.disabled = true;
	cantidad2.disabled = true;
	concepto2.disabled = true;
	cdescripcion2.disabled = true;
	costo2.disabled = true;
	consideraciones.disabled = true;
	entregables.disabled = true;
	formaspago.disabled = true;
	tiempoentrega.disabled = true;
	notas.disabled = true;
	editar.disabled = false;
	guardar.disabled = true;
	cancelar.disabled = true;
	reutilizar.disabled = false;
};*/