<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Digest
 *
 * This class provides a simple interface to the mhash library. It can
 * be used to create both salted and unsalted message digests. mhash was
 * chosen because it supports a wide variety of hash algorithms. For a
 * complete list of supported hashes, refer to the documentation of
 * mhash.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage cryptography
 */
class Digest {
	// Private members
	private static $Digest = null;
	private $Hash;
	private $XmlConfigDao;
	// Private properties
	private $saltedS2kAlgorithm;
	private $digestAlgorithm;
	private $digestAlgorithmBlockSize;
	private $randomDevice;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access public
	 */
	public function __construct() {
		$DaoFactory = DaoFactory::GetDaoFactory ( "xml" );
		$DomDocument = $DaoFactory->LoadXmlFile ( CONFIG_FILE, SCHEMA_FILE );
		$this->XmlConfigDao = $DaoFactory->GetConfigDao ( $DomDocument );
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//digest/randomDevice' );
		$this->randomDevice = $elementList ['randomDevice'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//digest/saltedS2kAlgorithm' );
		$this->saltedS2kAlgorithm = $elementList ['saltedS2kAlgorithm'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//digest/digestAlgorithm' );
		$this->digestAlgorithm = $elementList ['digestAlgorithm'];
		$this->Hash = new Hash ();
		$this->digestAlgorithmBlockSize = $this->Hash->GetBlockSize ( $this->digestAlgorithm );
	}
	/**
	 * function GetDigest
	 *
	 * This method generates a salted or unsalted message digest.
	 *
	 * @access public
	 * @param
	 *        	plaintext Plaintext
	 * @return string Base64 encoded ciphertext
	 */
	public function GetDigest($plaintext) {
		if (FALSE !== $this->saltedS2kAlgorithm) {
			$elementList = $this->XmlConfigDao->GetElementsByPath ( '//prng/randomDevice' );
			$salt = $this->Hash->GetSalt ( $this->digestAlgorithmBlockSize, $elementList ['randomDevice'] );
			try {
				$ciphertext = @mhash ( $this->digestAlgorithm, $plaintext . $salt );
				if (FALSE !== $ciphertext) {
					return (base64_encode ( $ciphertext . $salt ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Digest.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			return (base64_encode ( mhash ( $this->digestAlgorithm, $plaintext ) ));
		}
	}
	/**
	 * function IsValidDigest
	 *
	 * This method validates a salted or unsalted message digest.
	 *
	 * @access public
	 * @param
	 *        	ciphertext Ciphertext
	 * @param
	 *        	plaintext Plaintext
	 * @return boolean TRUE|FALSE
	 */
	public function IsValidDigest($ciphertext, $plaintext) {
		if (FALSE !== $this->saltedS2kAlgorithm) {
			$ciphertext = base64_decode ( $ciphertext );
			$salt = substr ( $ciphertext, $this->digestAlgorithmBlockSize );
			try {
				$genCiphertext = @mhash ( $this->digestAlgorithm, $plaintext . $salt );
				if (FALSE !== $genCiphertext) {
					$genCiphertext = $genCiphertext . $salt;
					return ($this->Hash->CompareCiphertextData ( $ciphertext, $genCiphertext ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Digest.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			$ciphertext = base64_decode ( $ciphertext );
			$genCiphertext = mhash ( $this->digestAlgorithm, $plaintext );
			return ($this->Hash->CompareCiphertextData ( $ciphertext, $genCiphertext ));
		}
	}
}
?>
