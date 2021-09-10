<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   private $template = 'template/';
   private $contenido   = 'template/body';

   public function __construct(){
      parent::__construct();
   }

   /** *******************  VISTAS  ****************** **/

   function _remap($areaID) {
      $this->index($areaID);
   }


   public function index($areaID = NULL){
      $this->load->model('areas');
      $areaID  = (is_integer($areaID))? $areaID : 1;
      $area    = $this->areas->get_area($areaID);
      if( $area ){
         $data=array(
            'title'           => "{$area->nombre} | " . SISTEMA,
            'template'        => $this->template,
            'view'            => 'index',
            'elementos'       => (object) array(
                                    'nombre'       => $area->nombre,
                                    'noticias'     => (object) array(
                                                         (object) array(
                                                            'imagen'    => 'https://tabasco.gob.mx/sites/default/files/users/setabasco/Carrusel-1B.jpg',
                                                            'titulo'    => 'Título noticia',
                                                            'subtitulo' => 'Subtítulo noticia',
                                                            'resumen'   => 'Breve descripción de la noticia'
                                                         )
                                                      ),
                                    'indicadores'  => $area->nombre,
                                    'mision'       => $area->mision,
                                    'vision'       => $area->vision,
                                    'directorio'   => (object) array(
                                                         (object) array( 
                                                            'nombre'    => 'DRA. EGLA CORNELIO LANDERO', 
                                                            'cargo'     => 'SECRETARIA GENERAL', 
                                                            'contacto'  => '00000 ext. 123' 
                                                         )
                                                      )
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