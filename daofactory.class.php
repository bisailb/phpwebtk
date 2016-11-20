<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class DaoFactory
 *
 * This class declares an interface for operations that create abstract
 * Data Access Objects (DAOs).
 *
 * @abstract
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
abstract class DaoFactory {
	/**
	 * function GetDaoFactory
	 *
	 * This method builds a Data Source Name (DSN) and invokes the
	 * appropriate DAO Factory with the DSN as a parameter.
	 *
	 * @access public
	 * @static
	 *
	 * @return mixed object instance|FALSE
	 */
	public static function GetDaoFactory($driver) {
		switch ($driver) {
			case 'mysql' :
				return (MysqlDaoFactory::GetInstance ());
				break;
			case 'mysqli' :
				return (MysqliDaoFactory::GetInstance ());
				break;
			case 'mysqlt' :
				return (MysqltDaoFactory::GetInstance ());
				break;
			case 'postgres7' :
				return (Postgres7DaoFactory::GetInstance ());
				break;
			case 'postgres8' :
				return (Postgres8DaoFactory::GetInstance ());
				break;
			case 'xml' :
				return (XmlDaoFactory::GetInstance ());
				break;
			default :
				return (FALSE);
				break;
		}
	}
}
?>
