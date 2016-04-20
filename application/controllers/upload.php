<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('upload_model');
    }

    function index() {
        //CARGAMOS LA VISTA DEL FORMULARIO
        $this->load->view('upload_view');
    }

    function validar(){
        $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[5]|max_length[10]|trim|xss_clean');
        $this->form_validation->set_message('required', 'El campo %s no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos %d carácteres');
        $this->form_validation->set_message('max_length', 'El campo %s no puede tener más de %d carácteres');
        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim|xss_clean');
        $this->form_validation->set_message('required', 'El campo %s no puede ir vacío!');
        //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
        if ($this->form_validation->run() == TRUE) 
        {
            $this->do_upload();
        }else{
        //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
            $this->index();
        }
    }

    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_view', $error);
        } else {
        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);

            $data = array('upload_data' => $this->upload->data());
            $nombre = $this->input->post('nombre');
            $imagen = 'graficos/portada/'.$file_info['file_name'];
            //$imagen = 'graficos/portada/'.$file_info['file_name'];
            $subir = $this->upload_model->subir($nombre,$imagen);  
            $this->load->view('imagen_subida_view', $data);
        }
    }
    //Función para crear la miniatura a la medida especificada
    function _create_thumbnail($filename){
        //Librería utilizada [GD, GD2, ImageMagick, NetPBM]
        $config['image_library'] = 'gd2';
        //Ruta de la imagen original
        $config['source_image'] = 'uploads/'.$filename;
        //Activación de la creación de miniaturas
        $config['create_thumb'] = TRUE;
        //Configuración para que mantenga la proporción
        $config['maintain_ratio'] = TRUE;
        //Ruta de la imagen miniatura
        $config['new_image']='uploads/thumbs/';
        //Tamaño
        $config['width'] = 150;
        $config['height'] = 150;
        //Reinicializamos los parametros de la librería
        $this->load->library('image_lib', $config); 
        //Creamos la miniatura
        $this->image_lib->resize();
        // finalmente limpiamos la cache para no saturar nuestro servidor
        $this->image_lib->clear();

    }
}