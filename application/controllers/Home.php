<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   private $template = 'template/';
   private $contenido   = 'template/body';

   public function __construct(){
      parent::__construct();
   }

   /** *******************  VISTAS  ****************** **/

   function _remap($cvArea) {
      $this->index($cvArea);
   }


   public function index($cvArea = NULL){
      $this->load->model('areas');
      $cvArea  = ($cvArea)? $cvArea : 'tecnologias';
      $cvArea  = ($cvArea === 'index')? 'tecnologias' : $cvArea;

      if ( $cvArea != 'tecnologias' && !preg_match('/^192.168.4./', $_SERVER['REMOTE_ADDR']) )
         return $this->load->view('template/maintenance');

      $area    = $this->areas->get_area($cvArea);

      if ( !$area )
         return $this->load->view('template/maintenance');

      $noticias = $this->areas->get_noticias($area[0]->id);

      $directorio = $this->areas->get_directorio($area[0]->id);

      if( $area ){
         $data=array(
            'title'           => "{$area[0]->nombre} | " . SISTEMA,
            'template'        => $this->template,
            'view'            => 'index',
            'elementos'       => (object) array(
                                    'nombre'       => $area[0]->nombre,
                                    'imagenes'     => $area[0]->json,
                                    'noticias'     => $noticias,
                                    'indicadores'  => TRUE,
                                    'mision'       => $area[0]->mision,
                                    'vision'       => $area[0]->vision,
                                    'directorio'   => (object) $directorio
                                 ),
         );
         $this->load->view( $this->contenido, $data );
      } else 
         $this->error_404();
   }

   public function error_404($ajax = FALSE){
      if ( $this->input->post('ajax') )
         $ajax = ( $this->input->post('ajax') == true )? TRUE : FALSE;

      $data=array(
         'title'           => '404 - Página No Encontrada | ' . SISTEMA,
         'template'        => $this->template,
         'view'            => 'plantilla/404'
      );
      if (! $ajax )
         $this->load->view( $this->contenido, $data );
      else
         $this->load->view( $data['view'], $data, TRUE );
   }

   public function error_permisos($ajax = FALSE){
      if ( $this->input->post('ajax') )
         $ajax = ( $this->input->post('ajax') == true )? TRUE : FALSE;

      $data=array(
         'title'           => 'Acceso Restringido | ' . SISTEMA,
         'template'        => $this->template,
         'view'            => 'plantilla/permisos'
      );
      if (! $ajax )
         $this->load->view( $this->contenido, $data );
      else
         $this->load->view( $data['view'], $data, TRUE );
   }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */