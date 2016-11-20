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
$plaintext = 'what do ya want for nothing?';
$Digest = new Digest ();
$ciphertext = $Digest->GetDigest ( $plaintext );
print ('Digest: ' . $ciphertext) ;
print ('<br />Plaintext: ' . $plaintext) ;
if (FALSE !== $Digest->IsValidDigest ( $ciphertext, $plaintext )) {
	print ('<br />Signature Valid') ;
} else {
	print ('<br />Invalid Signature') ;
}
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('<br />Time Elapsed: ' . $time) ;
?>
