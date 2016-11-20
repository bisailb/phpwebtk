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
$Session = new Session ();
$Session->OpenSession ();
print ('Cookie Name: ' . $Session->GetName ()) ;
print ('<br>Cookie Content: ' . $Session->GetId ()) ;
// Comment out the following line to view the session cookie in your web browser
// and at the savePath location defined in the phpwebtk.xml configuration file.
$Session->CloseSession ();
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('<br />Time Elapsed: ' . $time) ;
?>
