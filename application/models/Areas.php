<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Model {

   /**
   *  Función que obtiene un área con base a su ID para retornar sus datos
   *  @function   get_estudiante
   *  @param   integer  $cveArea
   *  @param   array    $filtros
   *  @param   array    $ordenadores
   *  @param   boolean  $modoRetorno
   **/

   public function get_area($cveArea, $filtros = NULL, $ordenadores = NULL){
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

      $this->db->where('shortname', $cveArea);
      $query      = $this->db->get(AREAS);
      $areas   = $query->result();
      
      if ( $areas ){
         // Obtener imagenes de attachments si se obtuvieron resultados
         $moduleID = $this->get_module_id(AREAS);
         foreach ($areas as $key => $area) {
            $areas[$key]->attachments = $this->get_attachment($moduleID, $area->id);
         }
      }

      return $areas;
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
      $query = $this->db->get(NOTICIAS);

      // Obtener imagenes de noticias
      if ( $query->num_rows() > 0 ){
         $noticias = $query->result();
         $moduleID = $this->get_module_id(NOTICIAS);
         foreach ($noticias as $key => $noticia) {
            $noticia->attachment = $this->get_attachment($moduleID, $noticia->id);
         }
         return (object)$noticias;
      }

      return [];
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

      $this->db->order_by('id', 'asc');
      
      $query = $this->db->get(DIRECTORIO);
      $datos = $query->result();
      
      if ( $query->num_rows() > 0 ){
         // Obtener imagenes de attachments si se obtuvieron resultados
         $moduleID = $this->get_module_id(DIRECTORIO);
         foreach ($datos as $key => $elemento) {
            $datos[$key]->attachments = $this->get_attachment($moduleID, $elemento->id);
         }
      }

      return $datos;

   }

   /**
    * Función para obtener imagenes de attachments
    **/
   private function get_attachment($modulo, $idComponente){
      $this->db->where('jsat_module', $modulo);
      $this->db->where('jsat_recid', $idComponente);

      return $this->db->get(ATTACHMENTS)->row();
   }

   private function get_module_id($module, $like = false){
      if ( $like )
         $this->db->like('jsmo_module', $module, 'BOTH');
      else
         $this->db->where('jsmo_module', $module);
      $query = $this->db->get(MODULES);
      return $query->row('id');
   }

}

/* End of file Areas.php */
/* Location: ./application/models/Areas.php */