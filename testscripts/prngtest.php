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
$Prng = new Prng ();
$random = $Prng->GetPseudoRandomValue ( 0 );
print ('/dev/random number: ' . $random) ;
$urandom = $Prng->GetPseudoRandomValue ( 1 );
print ('<br>/dev/urandom number: ' . $urandom) ;
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('<br />Time Elapsed: ' . $time) ;
?>
