<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class MysqltDaoFactory
 *
 * This class implements the DaoFactory's operations that create
 * concrete MySQL Data Access Objects (DAOs).
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class MysqltDaoFactory extends DaoFactory {
	// Private members
	private static $MysqltDaoFactory = null;
	private $dsn;
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
		$DaoFactory = DaoFactory::GetDaoFactory ( "xml" );
		$DomDocument = $DaoFactory->LoadXmlFile ( CONFIG_FILE, SCHEMA_FILE );
		$XmlConfigDao = $DaoFactory->GetConfigDao ( $DomDocument );
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/driver' );
		$driver = $elementList ['driver'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/username' );
		$username = $elementList ['username'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/password' );
		$password = $elementList ['password'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/hostname' );
		$hostname = $elementList ['hostname'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/database' );
		$database = $elementList ['database'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/persistent' );
		$persistent = $elementList ['persistent'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/debug' );
		$debug = $elementList ['debug'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/fetchmode' );
		$fetchmode = $elementList ['fetchmode'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/clientflags' );
		$clientflags = $elementList ['clientflags'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//mysql/socket' );
		$socket = $elementList ['socket'];
		$this->dsn = "$driver://$username:$password@$hostname/$database?persistent=$persistent&debug=$debug&fetchmode=$fetchmode&clientflags=$clientflags&socket=$socket";
	}
	/**
	 * function GetInstance
	 *
	 * This method instantiates a new object from this class; more
	 * specifically, it's a singleton instance.
	 *
	 * @access public
	 * @static
	 *
	 * @return MysqltDaoFactory object instance
	 */
	public static function GetInstance() {
		if (empty ( MysqltDaoFactory::$MysqltDaoFactory )) {
			MysqltDaoFactory::$MysqltDaoFactory = new MysqltDaoFactory ();
		}
		return (MysqltDaoFactory::$MysqltDaoFactory);
	}
	/**
	 * function CreateConnection
	 *
	 * This method creates a database connection object using the
	 * provided Data Source Name (DSN).
	 *
	 * @access public
	 * @param
	 *        	dsn Data Source Name (DSN)
	 * @return Database object instance
	 * @static
	 *
	 */
	public static function CreateConnection($dsn) {
		$Database = NewAdoConnection ( $dsn );
		return ($Database);
	}
	/**
	 * function GetSampleDao
	 *
	 * This method creates a new object of class MysqltSampleDao.
	 *
	 * @access public
	 * @return MysqltSampleDao object instance
	 */
	public function GetSampleDao() {
		return new MysqltSampleDao ( $this->dsn );
	}
}
?>
