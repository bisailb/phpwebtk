<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class HttpRequestBuilder
 *
 * This class constructs the parts of the Request by implementing the
 * RequestBuilder interface, defines and keeps track of the
 * representation it creates and provides an interface for retrieving
 * the Request object.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class HttpRequestBuilder extends RequestBuilder {
	// Private members
	private static $HttpRequestBuilder = null;
	private $Request;
	// Private properties
	private $ipAddress;
	private $ipAddresses;
	private $proxyAddress;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access public
	 */
	public function __construct() {
		$this->Request = new Request ();
		$this->GetHttpClientIPAddress ();
	}
	/**
	 * function GetInstance
	 *
	 * This method instantiates a new object from this class; more
	 * specifically, it's a singleton instance.
	 *
	 * @access public
	 * @return HttpRequestBuilder object instance
	 * @static
	 *
	 */
	public function GetInstance() {
		if (empty ( HttpRequestBuilder::$HttpRequestBuilder )) {
			HttpRequestBuilder::$HttpRequestBuilder = new HttpRequestBuilder ();
		}
		return (HttpRequestBuilder::$HttpRequestBuilder);
	}
	/**
	 * function GetHttpClientIPAddress
	 *
	 * This method sets the end user's IP address and proxy address if
	 * there is one.
	 *
	 * @access private
	 */
	private function GetHttpClientIPAddress() {
		if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] ) || isset ( $_SERVER ['HTTP_CLIENT_IP'] ) || isset ( $_SERVER ['REMOTE_ADDR'] )) {
			if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
				$this->ipAddress = $_SERVER ['HTTP_X_FORWARDED_FOR'];
				$this->proxyAddress = $_SERVER ['REMOTE_ADDR'];
			} else if (isset ( $_SERVER ['HTTP_CLIENT_IP'] )) {
				$this->ipAddress = $_SERVER ['HTTP_CLIENT_IP'];
			} else if (isset ( $_SERVER ['REMOTE_ADDR'] )) {
				$this->ipAddress = $_SERVER ['REMOTE_ADDR'];
			}
		} else {
			if (getenv ( 'HTTP_X_FORWARDED_FOR' )) {
				$this->ipAddress = getenv ( 'HTTP_X_FORWARDED_FOR' );
				$this->proxyAddress = getenv ( 'REMOTE_ADDR' );
			} else if (getenv ( 'HTTP_CLIENT_IP' )) {
				$this->ipAddress = getenv ( 'HTTP_CLIENT_IP' );
			} else {
				$this->ipAddress = getenv ( 'REMOTE_ADDR' );
			}
		}
		if (strstr ( $this->ipAddress, ',' )) {
			$this->ipAddresses = explode ( ',', $this->ipAddress );
			$this->ipAddress = $this->ipAddresses [0];
		}
	}
	/**
	 * function BuildHttpAccept
	 *
	 * This method sets the contents of the Accept: header from the
	 * current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpAccept() {
		if (isset ( $_SERVER ['HTTP_ACCEPT'] )) {
			$this->Request->SetProperty ( 'HTTP_ACCEPT', $_SERVER ['HTTP_ACCEPT'] );
		}
	}
	/**
	 * function BuildHttpAcceptCharset
	 *
	 * This method sets the contents of the Accept-Charset: header from
	 * the current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpAcceptCharset() {
		if (isset ( $_SERVER ['HTTP_ACCEPT_CHARSET'] )) {
			$this->Request->SetProperty ( 'HTTP_ACCEPT_CHARSET', $_SERVER ['HTTP_ACCEPT_CHARSET'] );
		}
	}
	/**
	 * function BuildHttpAcceptEncoding
	 *
	 * This method sets the contents of the Accept-Encoding: header from
	 * the current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpAcceptEncoding() {
		if (isset ( $_SERVER ['HTTP_ACCEPT_ENCODING'] )) {
			$this->Request->SetProperty ( 'HTTP_ACCEPT_ENCODING', $_SERVER ['HTTP_ACCEPT_ENCODING'] );
		}
	}
	/**
	 * function BuildHttpAcceptLanguage
	 *
	 * This method sets the contents of the Accept-Language: header from
	 * the current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpAcceptLanguage() {
		if (isset ( $_SERVER ['HTTP_ACCEPT_LANGUAGE'] )) {
			$this->Request->SetProperty ( 'HTTP_ACCEPT_LANGUAGE', $_SERVER ['HTTP_ACCEPT_LANGUAGE'] );
		}
	}
	/**
	 * function BuildHttpConnection
	 *
	 * This method sets the contents of the Connection: header from the
	 * current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpConnection() {
		if (isset ( $_SERVER ['HTTP_CONNECTION'] )) {
			$this->Request->SetProperty ( 'HTTP_CONNECTION', $_SERVER ['HTTP_CONNECTION'] );
		}
	}
	/**
	 * function BuildHttpGet
	 *
	 * This method sets variables provided to the script via HTTP GET.
	 *
	 * @access public
	 */
	public function BuildHttpGet() {
		if (isset ( $_GET )) {
			$this->Request->SetProperty ( 'HTTP_GET', $_GET );
		}
	}
	/**
	 * function BuildHttpHost
	 *
	 * This method sets the contents of the Host: header from the
	 * current request, if there is one.
	 *
	 * @access public
	 */
	public function BuildHttpHost() {
		if (isset ( $_SERVER ['HTTP_HOST'] )) {
			$this->Request->SetProperty ( 'HTTP_HOST', $_SERVER ['HTTP_HOST'] );
		}
	}
	/**
	 * function BuildHttpPost
	 *
	 * This method sets variables provided to the script via HTTP POST.
	 *
	 * @access public
	 */
	public function BuildHttpPost() {
		if (isset ( $_POST )) {
			$this->Request->SetProperty ( 'HTTP_POST', $_POST );
		}
	}
	/**
	 * function BuildHttpReferer
	 *
	 * This method sets the address of the page (if any) which referred
	 * the user agent to the current page. This is set by the user
	 * agent. Not all user agents will set this, and some provide the
	 * ability to modify HTTP_REFERER as a feature. In short, it cannot
	 * really be trusted.
	 *
	 * @access public
	 */
	public function BuildHttpReferer() {
		if (isset ( $_SERVER ['HTTP_REFERER'] )) {
			$this->Request->SetProperty ( 'HTTP_REFERER', $_SERVER ['HTTP_REFERER'] );
		}
	}
	/**
	 * function BuildHttpUserAgent
	 *
	 * This method sets the contents of the User-Agent: header from the
	 * current request, if there is one. This is a string denoting the
	 * user agent being which is accessing the page.
	 *
	 * @access public
	 */
	public function BuildHttpUserAgent() {
		if (isset ( $_SERVER ['HTTP_USER_AGENT'] )) {
			$this->Request->SetProperty ( 'HTTP_USER_AGENT', $_SERVER ['HTTP_USER_AGENT'] );
		}
	}
	/**
	 * function BuildQueryString
	 *
	 * This method sets the query string, if any, via which the page was
	 * accessed.
	 *
	 * @access public
	 */
	public function BuildQueryString() {
		if (isset ( $_SERVER ['QUERY_STRING'] )) {
			$this->Request->SetProperty ( 'QUERY_STRING', $_SERVER ['QUERY_STRING'] );
		}
	}
	/**
	 * function BuildRemoteAddress
	 *
	 * This method sets the IP address from which the user is viewing
	 * the current page.
	 *
	 * @access public
	 */
	public function BuildRemoteAddress() {
		if (TRUE !== empty ( $this->ipAddress )) {
			$this->Request->SetProperty ( 'REMOTE_ADDR', $this->ipAddress );
		}
	}
	/**
	 * function BuildRemoteHost
	 *
	 * This method sets the Host name from which the user is viewing the
	 * current page. The reverse dns lookup is based off the REMOTE_ADDR
	 * of the user.
	 *
	 * @access public
	 */
	public function BuildRemoteHost() {
		if (TRUE !== empty ( $this->ipAddress )) {
			$this->Request->SetProperty ( 'REMOTE_HOST', gethostbyaddr ( $this->ipAddress ) );
		}
	}
	/**
	 * function BuildRemotePort
	 *
	 * This method sets the port being used on the user's machine to
	 * communicate with the web server.
	 *
	 * @access public
	 */
	public function BuildRemotePort() {
		if (isset ( $_SERVER ['REMOTE_PORT'] )) {
			$this->Request->SetProperty ( 'REMOTE_PORT', $_SERVER ['REMOTE_PORT'] );
		}
	}
	/**
	 * function BuildRemoteProxyAddr
	 *
	 * This method sets the proxy IP address from which the user is
	 * being forwarded.
	 *
	 * @access public
	 */
	public function BuildRemoteProxyAddr() {
		if (TRUE !== empty ( $this->proxyAddress )) {
			$this->Request->SetProperty ( 'REMOTE_PROXY_ADDR', $this->proxyAddress );
		}
	}
	/**
	 * function BuildRemoteProxyHost
	 *
	 * This method sets the Host name from which the user is being
	 * forwarded. The reverse dns lookup is based off the
	 * REMOTE_PROXY_ADDR of the user.
	 *
	 * @access public
	 */
	public function BuildRemoteProxyHost() {
		if (TRUE !== empty ( $this->proxyAddress )) {
			$this->Request->SetProperty ( 'REMOTE_PROXY_HOST', gethostbyaddr ( $this->proxyAddress ) );
		}
	}
	/**
	 * function BuildRequestMethod
	 *
	 * This method sets the request method that was used to access the
	 * page.
	 *
	 * @access public
	 */
	public function BuildRequestMethod() {
		if (isset ( $_SERVER ['REQUEST_METHOD'] )) {
			$this->Request->SetProperty ( 'REQUEST_METHOD', $_SERVER ['REQUEST_METHOD'] );
		}
	}
	/**
	 * function BuildRequestUri
	 *
	 * This method retreives the URI which was given in order to access
	 * this page.
	 *
	 * @access public
	 */
	public function BuildRequestUri() {
		if (isset ( $_SERVER ['REQUEST_URI'] )) {
			$this->Request->SetProperty ( 'REQUEST_URI', $_SERVER ['SCRIPT_NAME'] . '?' . $_SERVER ['QUERY_STRING'] );
		} else if (isset ( $_SERVER ['REQUEST_URI'] )) {
			$this->Request->SetProperty ( 'REQUEST_URI', $_SERVER ['REQUEST_URI'] );
		}
	}
	/**
	 * function BuildServerProtocol
	 *
	 * This method sets the name and revision of the information
	 * protocol via which the page was requested.
	 *
	 * @access public
	 */
	public function BuildServerProtocol() {
		if (isset ( $_SERVER ['SERVER_PROTOCOL'] )) {
			$this->Request->SetProperty ( 'SERVER_PROTOCOL', $_SERVER ['SERVER_PROTOCOL'] );
		}
	}
	/**
	 * function GetRequest
	 *
	 * This method returns the Request object to the calling method.
	 *
	 * @access public
	 * @return Request object instance
	 */
	public function GetRequest() {
		return ($this->Request);
	}
}
?>
