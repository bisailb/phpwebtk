<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Controller
 *
 * This class serves as a single entry point for handling all requests
 * in the system. The front controller is responsible for delegating
 * processes to various handlers while minimizing the coupling among
 * these components by implementing flexible request handling
 * mechanisms, and managing the choice of the next view to present to
 * the end user.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class Controller {
	// Private members
	private static $Controller;
	/**
	 * function ProcessRequest
	 *
	 * This method initiates a session to preserve specific information
	 * across subsequent requests; adds or strips slashes from the HTTP
	 * GET or HTTP POST information; executes customized operations; and
	 * transfers the modified Request object to the Dispatch method
	 * along with the name of the view to present to the end user.
	 *
	 * @access public
	 * @param
	 *        	Request Request object
	 */
	public function ProcessRequest(Request $Request) {
		$Session = new Session ();
		$Session->OpenSession ();
		$SlashesRequestHandler = new SlashesRequestHandler ();
		$KsesRequestHandler = new KsesRequestHandler ();
		$SlashesRequestHandler->setSuccessor ( $KsesRequestHandler );
		$SlashesRequestHandler->HandleRequest ( $Request );
		$Receiver = new View ();
		$Command = new ViewCommand ( $Receiver );
		$Invoker = new Invoker ();
		$Invoker->SetCommand ( $Command );
		$viewName = $Invoker->ExecuteCommand ( $Request );
		$this->Dispatch ( $Request, $viewName );
		$Session->CloseSession ();
	}
	/**
	 * function Dispatch
	 *
	 * This method is responsible for view management and navigation.
	 * The dispatcher provides a dynamic dispatching mechanism to manage
	 * the choice of the next view to present to the end user.
	 *
	 * @access private
	 * @param
	 *        	Request Request object
	 * @param
	 *        	viewName View name for the class-based view
	 */
	private function Dispatch(Request $Request, $viewName) {
		if ($viewName) {
			$View = new $viewName ( $Request );
			$View->Display ();
		}
	}
}
?>
