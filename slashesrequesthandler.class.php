<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.3 Alpha
 *
 * @package phpwebtk
 */
/**
 * class SlashesRequestHandler
 *
 * This class handles requests it is responsible for and can access its
 * successor. If this class can handle the request, it does so;
 * otherwise it forwards the request to its successor.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage textprocessing
 */
class SlashesRequestHandler extends RequestHandler {
	/**
	 * function AddSlashesDeep
	 *
	 * This method enables magic quotes at runtime. Magic-quotes was
	 * added to reduce code written by beginners from being dangerous.
	 *
	 * @access private
	 * @param
	 *        	request HTTP GET or HTTP POST request
	 * @return request Modified HTTP GET or HTTP POST request
	 */
	private function AddSlashesDeep($request) {
		if (is_array ( $request )) {
			$request = array_map ( array (
					$this,
					'AddSlashesDeep' 
			), $request );
		} else {
			$request = addslashes ( $request );
		}
		return ($request);
	}
	/**
	 * function StripSlashesDeep
	 *
	 * This method disables magic quotes at runtime. If you disable
	 * magic quotes, you must be very careful to protect yourself from
	 * SQL injection attacks.
	 *
	 * @access private
	 * @param
	 *        	request HTTP GET or HTTP POST request
	 * @return request Modified HTTP GET or HTTP POST request
	 */
	private function StripSlashesDeep($request) {
		if (is_array ( $request )) {
			$request = array_map ( array (
					$this,
					'StripSlashesDeep' 
			), $request );
		} else {
			$request = stripslashes ( $request );
		}
		return ($request);
	}
	/**
	 * function HandleRequest
	 *
	 * This method processes the request if certain conditions are met.
	 *
	 * @access public
	 * @param
	 *        	Request Request object
	 */
	public function HandleRequest(Request $Request) {
		if (TRUE !== get_magic_quotes_gpc ()) {
			if (isset ( $Request->HTTP_GET )) {
				$Request->SetProperty ( 'HTTP_GET', array_map ( array (
						$this,
						'AddSlashesDeep' 
				), $Request->HTTP_GET ) );
			}
			if (isset ( $Request->HTTP_POST )) {
				$Request->SetProperty ( 'HTTP_POST', array_map ( array (
						$this,
						'AddSlashesDeep' 
				), $Request->HTTP_POST ) );
			}
		} else if (get_magic_quotes_gpc ()) {
			if (isset ( $Request->HTTP_GET )) {
				$Request->SetProperty ( 'HTTP_GET', array_map ( array (
						$this,
						'StripSlashesDeep' 
				), $Request->HTTP_GET ) );
			}
			if (isset ( $Request->HTTP_POST )) {
				$Request->SetProperty ( 'HTTP_POST', array_map ( array (
						$this,
						'StripSlashesDeep' 
				), $Request->HTTP_POST ) );
			}
		}
		if (TRUE !== empty ( $this->Successor )) {
			$this->Successor->HandleRequest ( $Request );
		}
	}
}
?>
