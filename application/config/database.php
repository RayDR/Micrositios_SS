<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'pruebas';
$query_builder = TRUE;

$db['pruebas'] = array(
   'dsn'      => '',
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'db',
   'dbdriver' => 'mysqli',
   'dbprefix' => '',
   'pconnect' => FALSE,
   'db_debug' => (ENVIRONMENT !== 'production'),
   'cache_on' => FALSE,
   'cachedir' => '',
   'char_set' => 'utf8',
   'dbcollat' => 'utf8_general_ci',
   'swap_pre' => '',
   'encrypt'  => FALSE,
   'compress' => FALSE,
   'stricton' => FALSE,
   'failover' => array(),
   'save_queries' => TRUE
);
