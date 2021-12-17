<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group   = ENVIRONMENT;
$query_builder  = TRUE;

$db_hostname    = '10.57.18.18';

$db_database    = 'postgres';

$db_username    = 'postgres';
$db_password    = 'Zetina2021**';


$db['development'] = array(
    'dsn'      => "pgsql:host=10.57.18.18;port=5432;dbname={$db_database};user={$db_username};password={$db_password}",
    'hostname' => $db_hostname,
    'username' => $db_username,
    'password' => $db_password,
    'database' => $db_database,
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['production'] = array(
    'dsn'      => "pgsql:host={$db_hostname};port=5432;dbname={$db_database};user={$db_username};password={$db_password}",
    'hostname' => $db_hostname,
    'username' => $db_username,
    'password' => $db_password,
    'database' => $db_database,
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);