<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class StreamIO
 *
 * This class provides stream input and output operations and supports
 * buffering for write operations. PHP will search for a protocol
 * handler (also known as a wrapper) for schemes in the form of
 * "scheme://..." unless URL-aware fopen wrappers and other wrappers
 * are disabled.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage filesandfolders
 */
class StreamIo {
	private $fileOrUrl;
	private $handle;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access public
	 */
	public function __construct($fileOrUrl) {
		$this->fileOrUrl = $fileOrUrl;
	}
	/**
	 * function Open
	 *
	 * This method opens a file or stream.
	 *
	 * @access public
	 * @param
	 *        	mode Type of access
	 * @return resource File pointer
	 */
	public function Open($mode) {
		try {
			$handle = @fopen ( $this->fileOrUrl, $mode );
			if (FALSE !== $handle) {
				$this->handle = $handle;
			} else {
				throw new Exception ( "<h1>\n  File Not Found or Permission Denied\n</h1>\n<strong>Warning:</strong> fopen(): Failed to open file or stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function Read
	 *
	 * This method reads all bytes from the file pointer (binary-safe).
	 *
	 * @access public
	 * @return string File contents
	 */
	public function Read() {
		$Exception = null;
		try {
			$buffer = null;
			$buffer = @fread ( $this->handle, sizeof ( $this->fileOrUrl ) );
			if (FALSE !== $buffer) {
				return ($buffer);
			} else {
				throw new Exception ( "<h1>\n  Read Failed\n</h1>\n<strong>Warning:</strong> fread(): Failed to read data from file " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function ReadLength
	 *
	 * This method reads a specific number of bytes from the file
	 * pointer (binary-safe).
	 *
	 * @access public
	 * @param
	 *        	length Length in bytes
	 * @return string File contents
	 */
	public function ReadLength($length) {
		$Exception = null;
		try {
			$buffer = null;
			$buffer = @fread ( $this->handle, $length );
			if (FALSE !== $buffer) {
				return ($buffer);
			} else {
				throw new Exception ( "<h1>\n  Read Failed\n</h1>\n<strong>Warning:</strong> fread(): Failed to read data from file " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function ReadStream
	 *
	 * This method reads all bytes from the stream pointer
	 * (binary-safe).
	 *
	 * @access public
	 * @return string Stream contents
	 */
	public function ReadStream() {
		$Exception = null;
		try {
			$buffer = null;
			while ( ! feof ( $this->handle ) ) {
				$buffer .= fread ( $this->handle, 8192 );
			}
			if (FALSE !== $buffer) {
				return ($buffer);
			} else {
				throw new Exception ( "<h1>\n  Read Failed\n</h1>\n<strong>Warning:</strong> fread(): Failed to read data from stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function ReadStreamLength
	 *
	 * This method reads a specific number of bytes from the stream
	 * pointer (binary-safe).
	 *
	 * @access public
	 * @param
	 *        	length Length in bytes
	 * @return string Stream contents
	 */
	public function ReadStreamLength($length) {
		$Exception = null;
		try {
			$buffer = null;
			while ( ! feof ( $this->handle ) ) {
				$buffer .= fread ( $this->handle, $length );
			}
			if (FALSE !== $buffer) {
				return ($buffer);
			} else {
				throw new Exception ( "<h1>\n  Read Failed\n</h1>\n<strong>Warning:</strong> fread(): Failed to read data from stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function Write
	 *
	 * This method writes all data to the file pointer (binary-safe).
	 *
	 * @access public
	 * @param
	 *        	data Data to write
	 */
	public function Write($data) {
		$Exception = null;
		try {
			$bytesWritten = fwrite ( $this->handle, $data );
			if (FALSE == $bytesWritten) {
				throw new Exception ( "<h1>\n  Write Failed\n</h1>\n<strong>Warning:</strong> fwrite(): Failed to write data to file or stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function WriteLength
	 *
	 * This method writes a specific number of bytes to the file
	 * pointer (binary-safe).
	 *
	 * @access public
	 * @param
	 *        	data Data to write
	 * @param
	 *        	length Length in bytes
	 */
	public function WriteLength($data, $length) {
		$Exception = null;
		try {
			$bytesWritten = fwrite ( $this->handle, $data );
			if (FALSE == $bytesWritten) {
				throw new Exception ( "<h1>\n  Write Failed\n</h1>\n<strong>Warning:</strong> fwrite(): Failed to write data to file or stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function Close
	 *
	 * This method closes a file or a stream.
	 *
	 * @access public
	 * @return resource File pointer
	 */
	public function Close() {
		try {
			if (FALSE == @fclose ( $this->handle )) {
				throw new Exception ( "<h1>\n  Close Failed\n</h1>\n<strong>Warning:</strong> fclose(): Failed to close file or stream " . $this->fileOrUrl . ' : phpwebtk.filesfolders.StreamIo.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
}
?>
