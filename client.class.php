<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Client
 *
 * This class is responsible for building a Request object and sending
 * the Request object to the front controller for processing. The front
 * controller then gives the response back to the end user.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class Client {
	// Private members
	private static $Client;
	private $Request;
	/**
	 * function BuildRequest
	 *
	 * This method constructs, retrieves and shares the Request object
	 * to this class locally so that it can be sent to the front
	 * controller via the SendRequest method for processing.
	 *
	 * @access private
	 */
	private function BuildRequest() {
		$RequestDirector = new RequestDirector ();
		$HttpRequestBuilder = HttpRequestBuilder::GetInstance ();
		$RequestDirector->ConstructRequest ( $HttpRequestBuilder );
		$this->Request = $HttpRequestBuilder->GetRequest ();
	}
	/**
	 * function SendRequest
	 *
	 * This method builds and sends the Request object to the front
	 * controller via the ProcessRequest method for processing. The
	 * front controller then gives a response back to the end user.
	 *
	 * @access public
	 */
	public function SendRequest() {
		$this->BuildRequest ();
		$Controller = new Controller ();
		$Controller->ProcessRequest ( $this->Request );
	}
}
?>
