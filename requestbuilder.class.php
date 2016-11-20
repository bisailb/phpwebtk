<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class RequestBuilder
 *
 * This class specifies an abstract interface for creating parts of a
 * Request object.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
abstract class RequestBuilder {
	// Abstract methods
	public abstract function BuildHttpAccept();
	public abstract function BuildHttpAcceptCharset();
	public abstract function BuildHttpAcceptEncoding();
	public abstract function BuildHttpAcceptLanguage();
	public abstract function BuildHttpConnection();
	public abstract function BuildHttpGet();
	public abstract function BuildHttpHost();
	public abstract function BuildHttpPost();
	public abstract function BuildHttpReferer();
	public abstract function BuildHttpUserAgent();
	public abstract function BuildQueryString();
	public abstract function BuildRemoteAddress();
	public abstract function BuildRemoteHost();
	public abstract function BuildRemotePort();
	public abstract function BuildRemoteProxyAddr();
	public abstract function BuildRemoteProxyHost();
	public abstract function BuildRequestMethod();
	public abstract function BuildRequestUri();
	public abstract function BuildServerProtocol();
	public abstract function GetRequest();
}
?>
