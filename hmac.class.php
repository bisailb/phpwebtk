<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Hmac
 *
 * The Hmac class provides a simple interface to the mhash library. It
 * can be invoked to create both salted and unsalted hashed message
 * authentication codes (HMAC). mhash was chosen because it supports a
 * wide variety of hash algorithms. For a complete list of supported
 * algorithms, refer to the documentation of mhash.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage cryptography
 */
class Hmac {
	// Private members
	private static $Hmac;
	private $Hash;
	private $XmlConfigDao;
	// Private properties
	private $randomDevice;
	private $saltedS2kAlgorithm;
	private $hmacAlgorithm;
	private $hmacKey;
	private $hmacAlgorithmBlockSize;
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
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//hmac/randomDevice' );
		$this->randomDevice = $elementList ['randomDevice'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//hmac/saltedS2kAlgorithm' );
		$this->saltedS2kAlgorithm = $elementList ['saltedS2kAlgorithm'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//hmac/hmacAlgorithm' );
		$this->hmacAlgorithm = $elementList ['hmacAlgorithm'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//hmac/hmacKey' );
		$this->hmacKey = $elementList ['hmacKey'];
		$this->Hash = new Hash ();
		$this->hmacAlgorithmBlockSize = $this->Hash->GetBlockSize ( $this->hmacAlgorithm );
	}
	/**
	 * function SetHmacKey
	 *
	 * The SetHmacKey method gets random bits from the Pseudo-Random
	 * Number Generator (PRNG), invokes the Salted S2K algorithm to
	 * further randomize the salt, hashes the plaintext including the
	 * salt to create an HMAC key and stores it in the XML configuration
	 * file.
	 *
	 * @access public
	 * @param
	 *        	plaintext Plaintext password
	 */
	public function SetHmacKey($plaintext) {
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//prng/randomDevice' );
		$salt = $this->Hash->GetSalt ( $this->hmacAlgorithmBlockSize, $elementList ['randomDevice'] );
		try {
			$this->hmacKey = @mhash ( $this->hmacAlgorithm, $plaintext . $salt );
			if (FALSE !== $this->hmacKey) {
				$this->hmacKey = base64_encode ( $this->hmacKey );
				$this->XmlConfigDao->SetElementByPath ( '//hmac/hmacKey', $this->hmacKey, CONFIG_FILE );
				return ($this->hmacKey);
			} else {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Hmac.Exception <strong>" );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function GetHmac
	 *
	 * The GetHmac method gets random bits from the Pseudo-Random Number
	 * Generator (PRNG), invokes the Salted S2k algorithm to further
	 * randomize the salt, hashes the plaintext including the salt and
	 * appends the salt to the end of the resultant ciphertext.
	 *
	 * @access public
	 * @param
	 *        	plaintext Plaintext password
	 * @return string Base64 encoded ciphertext
	 */
	public function GetHmac($plaintext) {
		if (FALSE !== $this->saltedS2kAlgorithm) {
			$elementList = $this->XmlConfigDao->GetElementsByPath ( '//prng/randomDevice' );
			$salt = $this->Hash->GetSalt ( $this->hmacAlgorithmBlockSize, $elementList ['randomDevice'] );
			try {
				$ciphertext = @mhash ( $this->hmacAlgorithm, $plaintext . $salt, base64_decode ( $this->hmacKey ) );
				if (FALSE !== $ciphertext) {
					return (base64_encode ( $ciphertext . $salt ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Hmac.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			try {
				$ciphertext = @mhash ( $this->hmacAlgorithm, $plaintext, base64_decode ( $this->hmacKey ) );
				if (FALSE !== $ciphertext) {
					return (base64_encode ( $ciphertext ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Hmac.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		}
	}
	/**
	 * function IsValidHmac
	 *
	 * The isValidHmac method validates a salted or unsalted message
	 * authentication code (HMAC).
	 *
	 * @access public
	 * @param
	 *        	ciphertext Ciphertext
	 * @param
	 *        	plaintext Plaintext
	 * @return boolean TRUE|FALSE
	 */
	public function IsValidHmac($ciphertext, $plaintext) {
		if (FALSE !== $this->saltedS2kAlgorithm) {
			$salt = substr ( base64_decode ( $ciphertext ), $this->hmacAlgorithmBlockSize );
			$ciphertext = base64_decode ( $ciphertext );
			try {
				$gen_ciphertext = @mhash ( $this->hmacAlgorithm, $plaintext . $salt, base64_decode ( $this->hmacKey ) ) . $salt;
				if (FALSE !== $gen_ciphertext) {
					return ($this->Hash->CompareCiphertextData ( $ciphertext, $gen_ciphertext ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Hmac.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			$ciphertext = base64_decode ( $ciphertext );
			try {
				$gen_ciphertext = @mhash ( $this->hmacAlgorithm, $plaintext, base64_decode ( $this->hmacKey ) );
				if (FALSE !== $gen_ciphertext) {
					return ($this->Hash->CompareCiphertextData ( $ciphertext, $gen_ciphertext ));
				} else {
					throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mhash(): An unknown error occurred : phpwebtk.cryptography.Hmac.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		}
	}
}
?>
