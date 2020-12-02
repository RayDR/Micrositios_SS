<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $template	= 'template/';
	private $contenido	= 'template/body';

	public function __construct(){
		parent::__construct();
	}

	/** *******************  VISTAS  ****************** **/

	public function index(){		
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'index',
			'comunicados'		=>	array(),
		);
		$this->load->view( $this->contenido, $data );
	}

	public function error_404($ajax = FALSE){
		if ( $this->input->post('ajax') )
			$ajax = ( $this->input->post('ajax') == true )? TRUE : FALSE;

		$data=array(
			'titulo'			=>	'404 - Página No Encontrada | ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'template/plantilla/404'
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
			'titulo'			=>	'Acceso Restringido | ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'template/plantilla/permisos'
		);
		if (! $ajax )
			$this->load->view( $this->contenido, $data );
		else
			$this->load->view( $data['view'], $data, TRUE );
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */