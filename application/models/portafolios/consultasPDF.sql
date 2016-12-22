/*Consulta para obter el portafolio que */ 
"SELECT * FROM portafolio_imagen 
INNER JOIN imagen 
ON portafolio_imagen.id_img = imagen.id_img 
INNER JOIN tipo_imagen
ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 1 LIMIT 1"

/*Consulta para obtener los servicios a incluir en el portafolio*/

"SELECT * FROM portafolio_tipo
INNER JOIN tipo_proyecto
ON portafolio_tipo.id_tipo = tipo_proyecto.id_tipo
WHERE portafolio_tipo.id_portafolio = $data['id_portafolio'] "

/*Consulta para obtener el personal a incluir en el portafolio*/
"SELECT * FROM portafolio_personal
INNER JOIN personal
ON portafolio_personal.id_personal = personal.id_personal
WHERE portafolio_personal.id_portafolio = $data['id_portafolio']"

/*Consulta para obtener el slider a incluir en el portafolio*/

"SELECT * FROM portafolio_imagen 
INNER JOIN imagen 
ON portafolio_imagen.id_img = imagen.id_img 
INNER JOIN tipo_imagen
ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 2"

/*Consulta para obtener los logotipos de experiencia y sus descripciones a incluir en el portafolio*/
"SELECT * FROM portafolio_imagen 
INNER JOIN imagen 
ON portafolio_imagen.id_img = imagen.id_img 
INNER JOIN tipo_imagen
ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 3"

/*Consulta para obtener los graficos de su trabajo a incluir en el portafolio*/
"SELECT * FROM portafolio_imagen 
INNER JOIN imagen 
ON portafolio_imagen.id_img = imagen.id_img 
INNER JOIN tipo_imagen
ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 4"

/*
Comando especiales
$var = strtoupper($var); Devuelve los caracteres alfanumericos convertidos en mayúsculas
$nom_proyec = str_split($emp); Convierte un string en un array
*/
