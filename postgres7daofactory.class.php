<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Postgres7DaoFactory
 *
 * This class implements the DaoFactory's operations that create
 * concrete PostgreSQL Data Access Objects (DAOs).
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class Postgres7DaoFactory extends DaoFactory {
	// Private members
	private static $Postgres7DaoFactory = null;
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
		$this->XmlConfigDao = $DaoFactory->GetConfigDao ( $DomDocument );
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/driver' );
		$driver = $elementList ['driver'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/username' );
		$username = $elementList ['username'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/password' );
		$password = $elementList ['password'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/hostname' );
		$hostname = $elementList ['hostname'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/database' );
		$database = $elementList ['database'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/persistent' );
		$persistent = $elementList ['persistent'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/debug' );
		$debug = $elementList ['debug'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres7/fetchmode' );
		$fetchmode = $elementList ['fetchmode'];
		$this->dsn = "$driver://$username:$password@$hostname/$database?persistent=$persistent&debug=$debug&fetchmode=$fetchmode";
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
	 * @return Postgres7DaoFactory object instance
	 */
	public static function GetInstance() {
		if (empty ( Postgres7DaoFactory::$Postgres7DaoFactory )) {
			Postgres7DaoFactory::$Postgres7DaoFactory = new Postgres7DaoFactory ();
		}
		return (Postgres7DaoFactory::$Postgres7DaoFactory);
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
	 * This method creates a new object of class Postgres7SampleDao.
	 *
	 * @access public
	 * @return Postgres7SampleDao object instance
	 */
	public function GetSampleDao() {
		return new Postgres7SampleDao ( $this->dsn );
	}
}
?>
