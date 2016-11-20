<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Convert
 *
 * This class provides some common data conversion functions.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage conversion
 */
class Convert {
	// Private members
	private static $Convert;
	/**
	 * function Hex2Bin
	 *
	 * This method converts hexadecimal data into a binary
	 * representation.
	 *
	 * @access public
	 * @param
	 *        	hexData Hexadecimal encoded data
	 * @return string Binary encoded data
	 */
	public function Hex2Bin($hexData) {
		$length = strlen ( $hexData );
		return (pack ( 'H' . $length, $hexData ));
	}
}
?>
