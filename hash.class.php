<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Hash
 *
 * This class provides a simple interface to the mhash library. mhash
 * was chosen because it supports a wide variety of hash algorithms. For
 * a complete list of supported hashes, refer to the documentation of
 * mhash.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage cryptography
 */
class Hash {
	// Private members
	private static $Hash;
	/**
	 * function GetHashInfo
	 *
	 * This method displays the hash id, the algorithm and the block
	 * size for each hash algorithm supported by the mhash library.
	 *
	 * @access public
	 * @return string Hash identifier, algorithm and output size
	 */
	public function GetHashInfo() {
		$hashId = mhash_count ();
		print ("<br />") ;
		for($i = 0; $i < $hashId; $i ++) {
			if (FALSE !== mhash_get_block_size ( $i )) {
				print ('Hash ID: ' . $i . "<br />\n" . 'Algorithm: ' . mhash_get_hash_name ( $i ) . "<br />\n" . 'Output Size: ' . mhash_get_block_size ( $i ) . "<br /><br />\n") ;
			}
		}
	}
	/**
	 * function GetBlockSize
	 *
	 * This method retrieves the block size of the specified hash.
	 *
	 * @access public
	 * @param
	 *        	hashId Hash identifier
	 * @return mixed Block size|FALSE
	 */
	public function GetBlockSize($hashId) {
		try {
			$blockSize = @mhash_get_block_size ( $hashId );
			if (FALSE !== $blockSize) {
				return ($blockSize);
			} else {
				throw new Exception ( "<h1>\n  Hash ID Not Found\n</h1>\n<strong>Fatal:</strong> mhash_get_block_size(): The specified hash id " . $hashId . ' does not exist : phpwebtk.cryptography.Hash.Exception <strong>' );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function GetSalt
	 *
	 * This method retrieves random bits from a Pseudo-Random Number
	 * Generator (PRNG).
	 *
	 * @access public
	 * @param
	 *        	bytes Size of salt in bytes
	 * @param
	 *        	source Random source of entropy
	 * @return string Binary encoded salt
	 * @static
	 *
	 */
	public function GetSalt($bytes, $source) {
		$Prng = new Prng ();
		return ($Prng->getPseudoRandomValue ( $source ));
	}
	/**
	 * function CompareCiphertextData
	 *
	 * This method compares the original ciphertext to the generated
	 * ciphertext.
	 *
	 * @access public
	 * @param
	 *        	ciphertext Original ciphertext
	 * @param
	 *        	genCiphertext Generated ciphertext
	 * @return boolean TRUE|FALSE
	 * @static
	 *
	 */
	public function CompareCiphertextData($ciphertext, $genCiphertext) {
		if (FALSE !== strcmp ( bin2hex ( $ciphertext ), bin2hex ( $genCiphertext ) )) {
			return (TRUE);
		} else {
			return (FALSE);
		}
	}
}
?>
