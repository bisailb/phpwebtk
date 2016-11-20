<?php
/**
 * The system path to the location of the PHP Web Toolkit class files.
 */
define ( 'CLASS_PATH', getenv ( 'DOCUMENT_ROOT' ) . '/phpwebtk/' );
/**
 * The system path to the location of the configuration XML file.
 */
define ( 'CONFIG_FILE', CLASS_PATH . 'configuration/phpwebtk.xml' );
/**
 * The system path to the location of the configuration XML Schema file.
 */
define ( 'SCHEMA_FILE', CLASS_PATH . 'configuration/phpwebtk.xsd' );
/**
 * Disable the "Run SQL" link for the web-based user interface for
 * performance monitoring.
 */
define ( 'ADODB_PERF_NO_RUN_SQL', 0 );
/**
 * The system path to the location of the Smarty class files.
 */
define ( 'SMARTY_DIR', CLASS_PATH . 'addons/smarty-3.1.21/' );
/**
 * The system paths to the locations of required dependencies.
 */
require_once (CLASS_PATH . 'addons/adodb-5.20.3/adodb.inc.php');
require_once (CLASS_PATH . 'addons/kses-0.2.2/oop/php5.class.kses.php');
require_once (SMARTY_DIR . 'Smarty.class.php');
?>
