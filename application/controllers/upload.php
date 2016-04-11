<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('imagen'); 
	}

	function index()
	{
		$this->load->view('imagenes/upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('imagenes/upload_form', $error);
		}
		else
		{   
			$file_info = $this->upload->data();

			$data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['full_path'];
            $subir = $this->imagen->subir($titulo,$imagen);     
			$this->load->view('imagenes/upload_success', $data);
		}
	}


}
?>