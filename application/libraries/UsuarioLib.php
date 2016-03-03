<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UsuarioLib { 
  function __construct() {
   $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería //Aqui se pone el control de los errores
   $this->CI->load->model('Model_Usuario');
     }
   public function login($user, $pass) {
     $query = $this->CI->Model_Usuario->get_login($user, $pass);
     if($query->num_rows() > 0) {
      $usuario = $query->row();
      $datosSession = array('usuario' => $usuario->name,
                         'usuario_id' => $usuario->id,);
      $this->CI->session->set_userdata($datosSession);
      return TRUE;
     }
     else {
      $this->CI->session->sess_destroy();
      return FALSE;
     }
    }	
	    public function cambiarPWD($act, $new) {
        if($this->CI->session->userdata('usuario_id') == null) {  //Para ver que el usuario existe 
            return FALSE;  //Si no existe regresa un FALSO
        }

        $id = $this->CI->session->userdata('usuario_id'); 
        $usuario = $this->CI->Model_Usuario->find($id);  //Aqui se manda llamar el metodo que encuentra el id

        if($usuario->password == $act) {  //Si la clave que esta en la base de datos es igual a la actual
            $data = array('id' => $id,  //Aqui ve si el usuario es el mimso con el id
                          'password' => $new);  
            $this->CI->Model_Usuario->update($data); //este metodo cambia el valor 
        }
        else {
            return FALSE;
        }
    }	
 /* Aqui se pone las clases para la validación la quitamos del controlador
     public function set_rules_ingresar() {
   $this->CI->form_validation->set_rules('login', 'Usuario', 'required');
   $this->CI->form_validation->set_rules('password', 'Clave', 'required');
     }*/
}
?>