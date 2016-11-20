<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class PException
 *
 * This class is responsible for exception handling and inherits from
 * the internal Exception class.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage debugging
 */
class PException extends Exception {
	/**
	 * function Display
	 *
	 * This method formats the error message appropriately and displays
	 * it.
	 *
	 * @access public
	 * @param
	 *        	Exception Exception object
	 * @static
	 *
	 */
	public static function Display(Exception $Exception) {
		print ($Exception->getMessage () . 'on line ' . $Exception->getLine () . "</strong>.\n<hr />\n\n") ;
	}
}
?>
