<?php
$start = microtime ( 1 );
// Includes and evaluates named constants and third party dependencies
require_once ('configuration/constants.php');
// Registers the given function as an __autoload() implementation
spl_autoload_register ( function ($class) {
	// Includes and evaluates class file dependencies
	require_once CLASS_PATH . strtolower ( $class ) . '.class.php';
} );
ob_start ();
// Instantiates a new Client object
$Client = new Client ();
// Builds and sends the Request object
//$Client->SendRequest ();
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('Time Elapsed: ' . $time) ;
?>
