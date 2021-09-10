<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group   = ENVIRONMENT;
$query_builder  = TRUE;

$db_hostname    = 'localhost';
$db_username    = 'postgres';
$db_password    = '120517rys';
$db_database    = 'postgres';

$db['production'] = array(
    'dsn'      => "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=120517rys",
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

$db['development'] = array(
    'dsn'      => "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=120517rys",
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