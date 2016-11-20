<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class ConfigDao
 *
 * This class declares an interface for a type of Data Access Object
 * (DAO).
 *
 * @abstract
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
abstract class ConfigDao {
	// Abstract methods
	public abstract function GetElementsByPath($expression);
	public abstract function SetElementByPath($expression, $data, $fileName);
}
?>
