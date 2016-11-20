<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class MysqlSampleDao
 *
 * This class defines a Data Access Object to be created by the
 * corresponding MysqlDaoFactory and implements the SampleDao interface.
 *
 * This class contains all MySQL specific code and SQL statements. The
 * implementation details are hidden from the end user.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class MysqlSampleDao extends SampleDao {
	// Private members
	private static $MysqlSampleDao;
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
	public function __construct($dsn) {
		$this->dsn = $dsn;
	}
	/**
	 * function InsertSample
	 *
	 * This method retrieves a database connection object, starts a
	 * transaction, executes SQL insert statements and catches any
	 * exceptions thrown.
	 *
	 * @access public
	 */
	public function InsertSample() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$Database->StartTrans ();
			$Database->Execute ( 'INSERT INTO `sample` VALUES (2, 20.00, \'ABCDEFGHIJK\', \'2\');' );
			$Database->Execute ( 'INSERT INTO `sample` VALUES (1, 10.00, \'ABCDEFGHIJK\', \'1\');' );
			$Database->CompleteTrans ();
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->gettrace () );
		}
	}
	/**
	 * function DeleteSample
	 *
	 * This method retrieves a database connection object, starts a
	 * transaction, executes SQL delete statements and catches any
	 * exceptions thrown.
	 *
	 * @access public
	 */
	public function DeleteSample() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$Database->StartTrans ();
			$Database->Execute ( 'DELETE FROM `sample` WHERE `id` = \'1\' LIMIT 1' );
			$Database->Execute ( 'DELETE FROM `sample` WHERE `id` = \'2\' LIMIT 1' );
			$Database->CompleteTrans ();
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->gettrace () );
		}
	}
	/**
	 * function FindSample
	 *
	 * This method retrieves a database connection object, executes SQL
	 * select statements, parses recordsets and catches any exceptions
	 * thrown.
	 *
	 * @access public
	 */
	public function FindSample() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$RecordSet = $Database->Execute ( 'SELECT `id` FROM `sample` WHERE `id` LIKE 1 ORDER BY `id` ASC' );
			$this->GetData ( $RecordSet );
			$RecordSet = $Database->Execute ( 'SELECT `id` FROM `sample` WHERE `id` LIKE 2 ORDER BY `id` ASC' );
			$this->GetData ( $RecordSet );
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->Gettrace () );
		}
	}
	/**
	 * function UpdateSample
	 *
	 * This method retrieves a database connection object, starts a
	 * transaction, executes SQL update statements and catches any
	 * exceptions thrown.
	 *
	 * @access public
	 */
	public function UpdateSample() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$Database->StartTrans ();
			$Database->Execute ( 'UPDATE `sample` SET `price` = \'15.00\' WHERE `id` = \'1\' LIMIT 1 ;' );
			$Database->Execute ( 'UPDATE `sample` SET `price` = \'25.00\' WHERE `id` = \'2\' LIMIT 1 ;' );
			$Database->CompleteTrans ();
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->gettrace () );
		}
	}
	/**
	 * function SelectSampleRS
	 *
	 * This method retrieves a database connection object, executes SQL
	 * select statements, parses recordsets and catches any exceptions
	 * thrown.
	 *
	 * @access public
	 */
	public function SelectSampleRS() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$RecordSet = $Database->Execute ( 'SELECT  * FROM `sample`' );
			$this->GetData ( $RecordSet );
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->gettrace () );
		}
	}
	/**
	 * function SelectSampleTO
	 *
	 * This method retrieves a database connection object, executes SQL
	 * select statements, parses recordsets and catches any exceptions
	 * thrown.
	 *
	 * @access public
	 */
	public function SelectSampleTO() {
		try {
			$Database = MysqlDaoFactory::CreateConnection ( $this->dsn );
			$RecordSet = $Database->Execute ( 'SELECT  * FROM `sample`' );
			$this->GetDataTO ( $RecordSet );
		} catch ( Exception $Exception ) {
			adodb_backtrace ( $Exception->gettrace () );
		}
	}
	/**
	 * function GetData
	 *
	 * This method uses PEAR style data retrieval to retrieve arrays
	 * containing the current row. FetchRow() internally moves to the
	 * next record after returning the current row.
	 *
	 * @access public
	 */
	public function GetData($RecordSet) {
		if (FALSE !== $RecordSet) {
			while ( $array = $RecordSet->FetchRow () ) {
				$ArrayObject = new ArrayObject ( $array );
				$Iterator = $ArrayObject->getIterator ();
				while ( $Iterator->valid () ) {
					print ($Iterator->key () . ' => ' . $Iterator->current () . "<br />") ;
					$Iterator->next ();
				}
			}
		}
	}
	/**
	 * function GetDataTO
	 *
	 * This method uses PEAR style data retrieval to retrieve the
	 * current row as an object. FetchNextObject() internally moves to
	 * the next row automatically.
	 *
	 * @access public
	 */
	public function GetDataTO($RecordSet) {
		if (FALSE !== $RecordSet) {
			while ( $SampleTO = $RecordSet->FetchNextObject ( FALSE ) ) {
				print ($SampleTO->id . "<br />") ;
				print ($SampleTO->price . "<br />") ;
				print ($SampleTO->code . "<br />") ;
				print ($SampleTO->numbers_only . "<br />") ;
			}
		}
	}
}
?>
