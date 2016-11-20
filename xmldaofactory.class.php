<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class XmlDaoFactory
 *
 * This class implements the DAO Factory's operations that create
 * concrete XML Data Access Objects (DAOs).
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class XmlDaoFactory extends DaoFactory {
	// Private members
	private static $XmlDaoFactory = null;
	/**
	 * function GetInstance
	 *
	 * This method instantiates a new object from this class; more
	 * specifically, it's a singleton instance.
	 *
	 * @access public
	 * @static
	 *
	 * @return XmlDaoFactory object instance
	 */
	public static function GetInstance() {
		if (empty ( XmlDaoFactory::$XmlDaoFactory )) {
			XmlDaoFactory::$XmlDaoFactory = new XmlDaoFactory ();
		}
		return (XmlDaoFactory::$XmlDaoFactory);
	}
	/**
	 * function LoadXmlFile
	 *
	 * This method loads XML from a file, validates its associated XML
	 * Schema and optionally preserves white space.
	 *
	 * @access public
	 * @param
	 *        	fileName XML file
	 * @param
	 *        	schemaName XML Schema file
	 * @param
	 *        	whiteSpace Preserve white space
	 * @return DomDocument object instance
	 */
	public function LoadXmlFile($fileName, $schemaName, $whiteSpace = FALSE) {
		$Exception = null;
		$DomDocument = new DOMDocument ( "1.0", "ISO-8859-15" );
		try {
			if (file_exists ( $fileName )) {
				try {
					if (TRUE !== @$DomDocument->load ( $fileName )) {
						throw new Exception ( "<h1>\n  XML Parse\n</h1>\n<strong>Fatal:</strong> " . '$DomDocument->load(): Error while parsing ' . $fileName . ' : phpwebtk.databases.XmlDaoFactory.Exception <strong>' );
					} else {
						try {
							if (file_exists ( $schemaName )) {
								try {
									if (TRUE !== @$DomDocument->schemaValidate ( $schemaName )) {
										throw new Exception ( "<h1>\n  XML Schema Parse\n</h1>\n<strong>Fatal:</strong> " . '$DomDocument->schemaValidate(): Error while validating ' . $schemaName . ' : phpwebtk.databases.XmlDaoFactory.Exception <strong>' );
									}
								} catch ( Exception $Exception ) {
									PException::Display ( $Exception );
								}
							} else {
								throw new Exception ( "<h1>\n  No Such File or Directory\n</h1>\n<strong>Fatal:</strong> file_exists(): Failed to open " . $schemaName . ' : phpwebtk.databases.XmlDaoFactory.Exception <strong>' );
							}
						} catch ( Exception $Exception ) {
							PException::Display ( $Exception );
						}
						$DomDocument->preserveWhiteSpace = $whiteSpace;
					}
				} catch ( Exception $Exception ) {
					PException::Display ( $Exception );
				}
			} else {
				throw new Exception ( "<h1>\n  No Such File or Directory\n</h1>\n<strong>Fatal:</strong> file_exists(): Failed to open " . $fileName . ' : phpwebtk.databases.XmlDaoFactory.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
		return ($DomDocument);
	}
	/**
	 * function GetConfigDao
	 *
	 * The GetConfigDao method creates a new object of class
	 * XmlConfigDao.
	 *
	 * @access public
	 * @param
	 *        	DomDocument DomDocument object
	 * @return XmlConfigDao object instance
	 */
	public function GetConfigDao(DomDocument $DomDocument) {
		return new XmlConfigDao ( $DomDocument );
	}
}
?>
