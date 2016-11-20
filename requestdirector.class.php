<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class RequestDirector
 *
 * This class constructs a Request object using the RequestBuilder
 * interface.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class RequestDirector {
	/**
	 * function ConstructRequest
	 *
	 * This method assembles the specified parts (below) of the Request.
	 *
	 * @access public
	 */
	public function ConstructRequest(RequestBuilder $RequestBuilder) {
		$RequestBuilder->BuildHttpAccept ();
		$RequestBuilder->BuildHttpAcceptCharset ();
		$RequestBuilder->BuildHttpAcceptEncoding ();
		$RequestBuilder->BuildHttpAcceptLanguage ();
		$RequestBuilder->BuildHttpConnection ();
		$RequestBuilder->BuildHttpGet ();
		$RequestBuilder->BuildHttpHost ();
		$RequestBuilder->BuildHttpPost ();
		$RequestBuilder->BuildHttpReferer ();
		$RequestBuilder->BuildHttpUserAgent ();
		$RequestBuilder->BuildQueryString ();
		$RequestBuilder->BuildRemoteAddress ();
		$RequestBuilder->BuildRemoteHost ();
		$RequestBuilder->BuildRemotePort ();
		$RequestBuilder->BuildRemoteProxyAddr ();
		$RequestBuilder->BuildRemoteProxyHost ();
		$RequestBuilder->BuildRequestMethod ();
		$RequestBuilder->BuildRequestUri ();
		$RequestBuilder->BuildServerProtocol ();
		$RequestBuilder->GetRequest ();
	}
}
?>
