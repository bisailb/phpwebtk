<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class View
 *
 * This class knows how to perform the operation(s) associated with
 * carrying out the request.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage http
 */
class View {
	/**
	 * function Action
	 *
	 * This method defines the operation(s) to be executed by the
	 * invoker.
	 *
	 * @access private
	 */
	public function Action(Request $Request) {
		if (! empty ( $Request->HTTP_GET ['page'] )) {
			$Exception = null;
			try {
				if (file_exists ( CLASS_PATH . $Request->HTTP_GET ['page'] . 'view.class.php' )) {
					return ($Request->HTTP_GET ['page'] . 'view');
				} else {
					throw new Exception ( "<h1>\n  Not Found\n</h1>\n<strong>Notice:</strong> Action(): The requested view does not exist. : phpwebtk.http.View.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			header ( 'Location: http://' . $Request->HTTP_HOST . dirname ( $Request->REQUEST_URI ) . 'index.php?action=view&page=sample' );
		}
	}
}
?>
