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
      if ( $cvArea != 'tecnologias' ){
         $this->load->view('template/maintenance');
         return;
      }

      $area    = $this->areas->get_area($cvArea);
      $noticias= $this->areas->get_noticias($area->id);

      $directorio = $this->areas->get_directorio($area->id);

      if( $area ){
         $data=array(
            'title'           => "{$area->nombre} | " . SISTEMA,
            'template'        => $this->template,
            'view'            => 'index',
            'elementos'       => (object) array(
                                    'nombre'       => $area->nombre,
                                    'imagenes'     => $area->json,
                                    'noticias'     => (object) $noticias,
                                    'indicadores'  => TRUE,
                                    'mision'       => $area->mision,
                                    'vision'       => $area->vision,
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