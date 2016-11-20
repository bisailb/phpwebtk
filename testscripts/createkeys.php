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
$Crypt = new Crypt ();
$Hmac = new Hmac ();
$hmackey = $Hmac->SetHmacKey ( 'foo' );
$encryptionkey = $Crypt->SetEncryptionKey ( $Hmac->GetHmac ( 'bar' ) );
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('Hmac Key: ' . $hmackey . '<br>Encryption Key: ' . $encryptionkey . '<br>Time Elapsed: ' . $time) ;
?>
