<?php
/*
 * 
 * 
 * 
 * 
 * 
 */
// display all error except deprecated and notice  
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
session_name("sample-login-script");
session_start();

// turn on output buffering 
ob_start();

define('DB_DRIVER', 'mysql');
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "sampletest");

require_once("functions.php");

// basic options for PDO 
$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

//connect with the server
//connect with the server
try {
    $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
} catch (Exception $ex) {
    echo errorMessage($ex->getMessage());
    die;
}

?>