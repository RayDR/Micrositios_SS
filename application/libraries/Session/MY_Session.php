<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session
{
	protected $ci;
	/**
	| Contiene usuario_id activo
	| @var	int
	*/
	protected $s_usuario;
	/**
	| Intentos de conexión fallidas
	| @var	int
	*/
	protected $s_icon_fallida = array();
	
	public function __construct(array $params = array())
	{
		parent::__construct();
		$this->ci=& get_instance();

		log_message('debug', "Librería de Sesión inicializada.");
	}
	
	public function establecer_sesion($usuario, $datos = array() ){
		$exito = TRUE;		
		// Eliminar intentos
		$this->var_sesion( 'intentos', FALSE );
		// Asignar el id de usuario
		$this->var_sesion( array('uid' => $usuario) );
		if ( $datos ){ // Almacenar las variables enviadas
			$this->var_sesion( $datos );
		}
		// Verificar el estatus del usuario
		// Guardar 
		return $exito;
	}

	/**
	| Establece/Elimina variables de sesión
	|
	| @param	mixed	$variables	Variable o arreglo de variables de sesión
	| @param	bool	$modo		Establecer(True)/Eliminar(False)
	| @return	void
	**/
	private function var_sesion($variables, $modo = TRUE){
		if ( $modo )
			$this->set_userdata( $variables );
		else
			$this->unset_userdata( $variables );
	}
}
