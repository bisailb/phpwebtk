<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Request
 *
 * This class represents the complex Request object under construction.
 * The RequestBuilder builds the Request object's internal
 * representation and defines the process by which it's assembled. This
 * class includes classes that define the constituent parts, includng
 * interfaces for assembling the parts into the final result.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class Request {
	/**
	 * function SetProperty
	 *
	 * This method sets dynamic properties of this class.
	 *
	 * @access public
	 * @static
	 *
	 */
	public function SetProperty($propertyName, $requestPart) {
		$this->{$propertyName} = $requestPart;
	}
}
?>
