<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Invoker
 *
 * This class asks the command to carry out the request.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class Invoker {
	// Private members
	private static $Invoker;
	private $Command;
	/**
	 * function SetCommand
	 *
	 * This method sets the command.
	 *
	 * @access private
	 */
	public function SetCommand(Command $Command) {
		$this->Command = $Command;
	}
	/**
	 * function SetCommand
	 *
	 * This method executes the command and returns the result to the
	 * receiver.
	 *
	 * @access private
	 */
	public function ExecuteCommand(Request $Request) {
		$result = $this->Command->Execute ( $Request );
		return ($result);
	}
}
?>
