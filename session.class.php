<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Session
 *
 * This class enables data to be preserved across subsequent requests
 * invoked by the end user.
 *
 * Additional measures must be taken to actively protect the integrity
 * of a session.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage usermanagement
 */
class Session {
	// Private members
	private $XmlConfigDao;
	// Private properties
	private $savePath;
	private $name;
	private $cookieLifetime;
	private $cookiePath;
	private $cookieDomain;
	private $cookieSecure;
	private $cacheLimiter;
	private $cacheExpire;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access private
	 */
	public function __construct() {
		$DaoFactory = DaoFactory::GetDaoFactory ( "xml" );
		$DomDocument = $DaoFactory->LoadXmlFile ( CONFIG_FILE, SCHEMA_FILE );
		$this->XmlConfigDao = $DaoFactory->GetConfigDao ( $DomDocument );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/savePath' );
		$this->savePath = $elementList ['savePath'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/name' );
		$this->name = $elementList ['name'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/entropyFile' );
		ini_set ( 'session.entropy_file', $elementList ['entropyFile'] );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/entropyLength' );
		ini_set ( 'session.entropy_length', $elementList ['entropyLength'] );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/useOnlyCookies' );
		ini_set ( 'session.use_only_cookies', $elementList ['useOnlyCookies'] );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cookieLifetime' );
		$this->cookieLifetime = $elementList ['cookieLifetime'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cookiePath' );
		$this->cookiePath = $elementList ['cookiePath'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cookieDomain' );
		$this->cookieDomain = $elementList ['cookieDomain'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cookieSecure' );
		$this->cookieSecure = $elementList ['cookieSecure'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cacheLimiter' );
		$this->cacheLimiter = $elementList ['cacheLimiter'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/cacheExpire' );
		$this->cacheExpire = $elementList ['cacheExpire'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/hashFunction' );
		ini_set ( 'session.hash_function', $elementList ['hashFunction'] );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//session/hashBitsPerCharacter' );
		ini_set ( 'session.hash_bits_per_character', $elementList ['hashBitsPerCharacter'] );
	}
	/**
	 * function GetCacheExpire
	 *
	 * This method retrieves the current cache expire setting.
	 *
	 * @access public
	 * @return integer Current cache expire
	 */
	public function GetCacheExpire() {
		return (session_cache_expire ());
	}
	/**
	 * function GetCacheLimiter
	 *
	 * This method retrieves the current cache limiter setting.
	 *
	 * @access public
	 * @return string Current cache limiter
	 */
	public function GetCacheLimiter() {
		return (session_cache_limiter ());
	}
	/**
	 * function GetCookieParameters
	 *
	 * This method retrieves the session cookie parameters.
	 *
	 * @access public
	 * @return array Session cookie parameters
	 */
	public function GetCookieParameters() {
		return (session_get_cookie_params ());
	}
	/**
	 * function getId
	 *
	 * This method retrieves the current session id.
	 *
	 * @access public
	 * @return string Current session id
	 */
	public function GetId() {
		return (session_id ());
	}
	/**
	 * function GetName
	 *
	 * This method retrieves the current session name.
	 *
	 * @access public
	 * @return string Current session name
	 */
	public function GetName() {
		return (session_name ());
	}
	/**
	 * function GetSavePath
	 *
	 * This method retrieves the current session save path.
	 *
	 * @access public
	 * @return string Current session save path
	 */
	public function GetSavePath() {
		return (session_save_path ());
	}
	/**
	 * function OpenSession
	 *
	 * This method sets the current session save path, the session name,
	 * the session cookie parameters, the current cache limiter, the
	 * current cache expire and starts a session.
	 *
	 * @access public
	 */
	public function OpenSession() {
		session_save_path ( $this->savePath );
		session_name ( $this->name );
		session_set_cookie_params ( $this->cookieLifetime, $this->cookiePath, $this->cookieDomain, $this->cookieSecure );
		session_cache_limiter ( $this->cacheLimiter );
		session_cache_expire ( $this->cacheExpire );
		if (! session_id ()) {
			session_start ();
		}
	}
	/**
	 * function CloseSession() {
	 *
	 * This method starts a session if it does not exist, destroys all
	 * data registered to the session, and expires the session cookie.
	 *
	 * @access public
	 */
	public function CloseSession() {
		if (FALSE !== $_SESSION) {
			$this->OpenSession ();
		}
		$_SESSION = array ();
		session_destroy ();
		$cookie_params = session_get_cookie_params ();
		if (empty ( $cookie_params ['domain'] ) && empty ( $cookie_params ['secure'] ) && ! headers_sent) {
			setcookie ( session_name (), session_id (), time () - 3600, $cookie_params ['path'] );
		} else if (empty ( $cookie_params ['secure'] ) && ! headers_sent ()) {
			setcookie ( session_name (), session_id (), time () - 3600, $cookie_params ['path'], $cookie_params ['domain'] );
		} else if (! headers_sent ()) {
			setcookie ( session_name (), session_id (), time () - 3600, $cookie_params ['path'], $cookie_params ['domain'], $cookie_params ['secure'] );
		}
	}
}
?>
