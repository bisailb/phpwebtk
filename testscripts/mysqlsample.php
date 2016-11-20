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
$DaoFactory = DaoFactory::GetDaoFactory ("mysqli");
$SampleDao = $DaoFactory->GetSampleDao ();
$SampleDao->InsertSample ();
$SampleDao->SelectSampleRS ();
$SampleDao->UpdateSample ();
$SampleDao->SelectSampleRS ();
$SampleDao->DeleteSample ();
ob_end_flush ();
$stop = microtime ( 1 );
$time = $stop - $start;
print ('<br />Time Elapsed: ' . $time) ;
?>
