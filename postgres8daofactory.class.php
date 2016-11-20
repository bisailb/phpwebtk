<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Postgres8DaoFactory
 *
 * This class implements the DaoFactory's operations that create
 * concrete PostgreSQL Data Access Objects (DAOs).
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class Postgres8DaoFactory extends DaoFactory {
	// Private members
	private static $Postgres8DaoFactory;
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
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/driver' );
		$driver = $elementList ['driver'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/username' );
		$username = $elementList ['username'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/password' );
		$password = $elementList ['password'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/hostname' );
		$hostname = $elementList ['hostname'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/database' );
		$database = $elementList ['database'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/persistent' );
		$persistent = $elementList ['persistent'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/debug' );
		$debug = $elementList ['debug'];
		$elementList = $XmlConfigDao->GetElementsByPath ( '//postgres8/fetchmode' );
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
	 * @return Postgres8DaoFactory object instance
	 */
	public static function GetInstance() {
		$Postgres8DaoFactory = null;
		if (empty ( Postgres8DaoFactory::$Postgres8DaoFactory )) {
			Postgres8DaoFactory::$Postgres8DaoFactory = new Postgres8DaoFactory ();
		}
		return (Postgres8DaoFactory::$Postgres8DaoFactory);
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
	 * This method creates a new object of class Postgres8SampleDao.
	 *
	 * @access public
	 * @return Postgres8SampleDao object instance
	 */
	public function GetSampleDao() {
		return new Postgres8SampleDao ( $this->dsn );
	}
}
?>
