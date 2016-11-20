<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class ViewCommand
 *
 * This class defines a binding between a View object and an action, and
 * implements Execute by invoking the corresponding operation(s) on the
 * View.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class ViewCommand extends Command {
	protected $Receiver;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access private
	 */
	public function __construct(View $Receiver) {
		$this->Receiver = $Receiver;
	}
	/**
	 * function Execute
	 *
	 * This method executes the action and returns the result to the
	 * invoker.
	 *
	 * @access public
	 */
	public function Execute(Request $Request) {
		$result = $this->Receiver->Action ( $Request );
		return ($result);
	}
}
?>
