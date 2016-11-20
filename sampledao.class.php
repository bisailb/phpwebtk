<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class SampleDao
 *
 * Declares an interface for a type of Data Access Object (DAO).
 *
 * @abstract
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage databases
 */
abstract class SampleDao {
	// Abstract methods
	public abstract function InsertSample();
	public abstract function DeleteSample();
	public abstract function FindSample();
	public abstract function UpdateSample();
	public abstract function SelectSampleRS();
	public abstract function SelectSampleTO();
	public abstract function GetData($RecordSet);
	public abstract function GetDataTO($RecordSet);
}
?>
