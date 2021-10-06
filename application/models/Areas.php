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

   /**
   *  Función que obtiene las noticias de área
   *  @function   get_estudiante
   *  @param   integer  $areaID
   *  @param   array    $filtros
   *  @param   array    $ordenadores
   *  @param   boolean  $modoRetorno
   **/

   public function get_noticias($areaID, $filtros = NULL, $ordenadores = NULL, $modoRetorno = TRUE){
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

      $this->db->where('areaid', $areaID);
      $query = $this->db->get('microsites.notes');
      if ( $modoRetorno )
         return $query->result();
      else
         return $query->result_array();

   }

   /**
   *  Función que obtiene el directorio de un área
   *  @function   get_estudiante
   *  @param   integer  $areaID
   *  @param   array    $filtros
   *  @param   array    $ordenadores
   *  @param   boolean  $modoRetorno
   **/

   public function get_directorio($areaID, $filtros = NULL, $ordenadores = NULL){
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
      $this->db->or_where('areaid', 0);
      $this->db->or_where('areaid', $areaID);
      
      $query = $this->db->get('microsites.persons');
      $datos = $query->result();
      
      if ( $query->num_rows() > 0 ){
         // Obtener imagenes de attachments si se obtuvieron resultados
         foreach ($datos as $key => $elemento) {
            $datos[$key] = (object)['attachments' => $this->get_attachment('179', $elemento->id)];
         }
      }

      return $datos;

   }

   /**
    * Función para obtener imagenes de attachments
    **/
   private function get_attachment($modulo, $idPersona){
      $this->db->where('jsat_module', $modulo);
      $this->db->where('jsat_recid', $idPersona);

      return $this->db->get('webcore.jsattachments')->row();
   }

}

/* End of file Areas.php */
/* Location: ./application/models/Areas.php */