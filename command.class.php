<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Command
 *
 * This class declares an interface for executing an operation.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
abstract class Command {
	// Abstract Methods
	public abstract function Execute(Request $Request);
}
?>
