<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Model {

   /**
   *  Función que obtiene un área con base a su ID para retornar sus datos
   *  @function   get_estudiante
   *  @param   integer  $areaID
   *  @param   array    $filtros
   *  @param   array    $ordenadores
   *  @param   boolean  $modoRetorno
   **/

   public function get_area($areaID, $filtros = NULL, $ordenadores = NULL, $modoRetorno = TRUE){
      // Opciones de filtrado adicional
      if( is_array($filtros) ){
         foreach ($filtros as $campo => $filtro) {
            if ( is_string($campo) )
               $this->db->where($campo, $filtro);
            else
               $this->db->where($filtro);
         }
      }
      // Opciones de ordenamiento
      if( is_array($ordenadores) ){
         foreach ($ordenadores as $campo => $orden) {
            if ( is_string($campo) )
               $this->db->where($campo, $orden);
            else
               $this->db->where($orden);
         }
      }

      $this->db->where('id', $areaID);
      $query = $this->db->get('microsites.areas');
      if ( $modoRetorno )
         return $query->row();
      else
         return $query->row_array();

   }

}

/* End of file Areas.php */
/* Location: ./application/models/Areas.php */