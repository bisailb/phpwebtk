<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class XmlConfigDao
 *
 * This class defines a Data Access Object (DAO) to be created by the
 * corresponding XmlDaoFactory and implements the ConfigDao interface.
 *
 * This class contains all XML specific code and XPath statements.
 * implementation details are hidden from the end user.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
class XmlConfigDao extends ConfigDao {
	private $DomDocument;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access private
	 */
	public function __construct(DomDocument $DomDocument) {
		$this->DomDocument = $DomDocument;
	}
	/**
	 * function GetElementsByPath
	 *
	 * This method queries an XML document for a specific node(s)
	 * matching some criteria and returns a collection of elements and
	 * their associated values.
	 *
	 * @access public
	 * @param
	 *        	expression XPath expression
	 * @return array XML element value list
	 */
	public function GetElementsByPath($expression) {
		$elementList = array ();
		$DomXpath = new DomXpath ( $this->DomDocument );
		$DomNodeList = $DomXpath->query ( $expression );
		if (is_object ( $DomNodeList ) && $DomNodeList->length) {
			foreach ( $DomNodeList as $DomElement ) {
				$elementList [$DomElement->tagName] = $DomElement->textContent;
			}
		}
		return ($elementList);
	}
	/**
	 * function SetElementByPath
	 *
	 * This method queries an XML document for a specific node(s)
	 * matching some criteria and replaces the original text content
	 * with new text content.
	 *
	 * @access public
	 * @param
	 *        	expression XPath expression
	 * @param
	 *        	data Data to write
	 * @param
	 *        	fileName XML file to save
	 */
	public function SetElementByPath($expression, $data, $fileName) {
		$DomXpath = new DomXpath ( $this->DomDocument );
		$DomNodeList = $DomXpath->query ( $expression );
		if (is_object ( $DomNodeList ) && $DomNodeList->length) {
			foreach ( $DomNodeList as $DomElement ) {
				$DomText = $this->DomDocument->createTextNode ( $data );
				$DomElement->replaceChild ( $DomText, $DomElement->firstChild );
			}
		}
		$this->DomDocument->save ( $fileName );
	}
}
?>
