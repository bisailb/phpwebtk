<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * abstract class RequestHandler
 *
 * This class defines an interface for handling the requests and
 * optionally implements the successor link.
 *
 * @abstract
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage textprocessing
 */
abstract class RequestHandler {
	// Protected members
	protected $Successor;
	// Abstract methods
	public abstract function HandleRequest(Request $Request);
	/**
	 * function SetSuccessor
	 *
	 * This method sets the Successor.
	 *
	 * @access public
	 * @param object $Successor
	 *        	object of type Handler
	 */
	public function SetSuccessor(RequestHandler $Successor) {
		$this->Successor = $Successor;
	}
}
?>
