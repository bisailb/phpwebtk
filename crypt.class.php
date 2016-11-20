<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Crypt
 *
 * This class provides a simple interface to the mcrypt library. It can
 * be used to encrypt and decrypt data. mcrypt was chosen because it
 * supports a wide variety of block algorithms and cipher modes. For a
 * complete list of supported algorithms and modes refer to the
 * documentation of mcrypt.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage cryptography
 */
class Crypt {
	// Private members
	private static $Crypt;
	private $Hash;
	private $XmlConfigDao;
	private $Convert;
	// Private properties
	private $encryptionDescriptor;
	private $initializationVector;
	private $randomDevice;
	private $blockAlgorithm;
	private $blockAlgorithmMode;
	private $encryptionKey;
	private $hmacAlgorithm;
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
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//crypt/randomDevice' );
		$this->randomDevice = $elementList ['randomDevice'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//crypt/blockAlgorithm' );
		$this->blockAlgorithm = $elementList ['blockAlgorithm'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//crypt/blockAlgorithmMode' );
		$this->blockAlgorithmMode = $elementList ['blockAlgorithmMode'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//crypt/encryptionKey' );
		$this->encryptionKey = $elementList ['encryptionKey'];
		$elementList = $this->XmlConfigDao->GetElementsByPath ( '//hmac/hmacAlgorithm' );
		$this->hmacAlgorithm = $elementList ['hmacAlgorithm'];
		$this->Hash = new Hash ();
		$this->hmacAlgorithmBlockSize = $this->Hash->GetBlockSize ( $this->hmacAlgorithm );
		$this->Hmac = new Hmac ();
		$this->Convert = new Convert ();
	}
	/**
	 * function GetIvSize
	 *
	 * This method retrieves the size of the Initialization Vector (IV)
	 * belonging to a specific cipher/mode combination.
	 *
	 * @access private
	 * @return integer Size of IV
	 */
	private function GetIvSize() {
		try {
			$ivSize = @mcrypt_enc_get_iv_size ( $this->encryptionDescriptor );
			if (is_null ( $ivSize )) {
				throw new Exception ( "<h1>\n  IV Size Failed\n</h1>\n<strong>Fatal:</strong> openModule(): Failed to get size of Initialization Vector (IV) : phpwebtk.cryptography.Crypt.Exception <strong>" );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
		return ($ivSize);
	}
	/**
	 * function GetKeySize
	 *
	 * This method retrieves the maximum supported key size of the
	 * opened mode.
	 *
	 * @access private
	 * @return integer Key size
	 */
	private function GetKeySize() {
		try {
			$keySize = @mcrypt_enc_get_key_size ( $this->encryptionDescriptor );
			if (is_null ( $keySize )) {
				throw new Exception ( "<h1>\n  Key Size Failed\n</h1>\n<strong>Fatal:</strong> openModule(): Failed to get maximum supported key size of the opened mode : phpwebtk.cryptography.Crypt.Exception <strong>" );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
		return ($keySize);
	}
	/**
	 * function GetBlockSize
	 *
	 * This method retrieves the blocksize of the opened algorithm.
	 *
	 * @access private
	 * @return integer Block size
	 */
	private function GetBlockSize() {
		return (mcrypt_enc_get_block_size ( $this->encryptionDescriptor ));
	}
	/**
	 * function OpenModule
	 *
	 * This method opens the module of the algorithm and the mode to be
	 * used.
	 *
	 * @access private
	 * @return mixed Encryption descriptor|FALSE
	 */
	private function OpenModule() {
		$Exception = null;
		try {
			if (FALSE == ($this->encryptionDescriptor = @mcrypt_module_open ( $this->blockAlgorithm, '', $this->blockAlgorithmMode, '' ))) {
				throw new Exception ( "<h1>\n  Encryption Module Failure\n</h1>\n<strong>Fatal:</strong> openModule(): Failed to open encryption module : phpwebtk.cryptography.Crypt.Exception <strong>" );
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
	}
	/**
	 * function GetRandomIv
	 *
	 * This method retrieves the Initialization Vector (IV) from a
	 * registered session.
	 *
	 * @access private
	 * @return mixed Initialization Vector (IV)|FALSE
	 */
	private function GetRandomIv() {
		$Exception = null;
		if (isset ( $_SESSION ['randomIv'] ) && ! empty ( $_SESSION ['randomIv'] )) {
			try {
				if (FALSE == ($this->initializationVector = base64_decode ( $_SESSION ['randomIv'] ))) {
					throw new Exception ( "<h1>\n  Decoding Failed\n</h1>\n<strong>Fatal:</strong> base64_decode(): Failed to decode data : phpwebtk.cryptography.Crypt.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		}
		return ($this->initializationVector);
	}
	/**
	 * function SetRandomIv
	 *
	 * This method creates the Initialization Vector (IV) from a random
	 * source and stores it in a registered session.
	 *
	 * @access private
	 * @return mixed Initialization Vector (IV)|FALSE
	 */
	private function SetRandomIv() {
		$Exception = null;
		if (isset ( $_SESSION ['randomIv'] ) && ! empty ( $_SESSION ['randomIv'] )) {
			try {
				if (FALSE == ($this->initializationVector = base64_decode ( $_SESSION ['randomIv'] ))) {
					throw new Exception ( "<h1>\n  Decoding Failed\n</h1>\n<strong>Fatal:</strong> base64_decode(): Failed to decode data : phpwebtk.cryptography.Crypt.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		} else {
			try {
				if (FALSE !== ($this->initializationVector = @mcrypt_create_iv ( $this->GetIvSize (), $this->randomDevice ))) {
					$_SESSION ['randomIv'] = base64_encode ( $this->initializationVector );
				} else {
					throw new Exception ( "<h1>\n  IV Creation Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_create_iv(): Failed to create initialization vector (IV) : phpwebtk.cryptography.Crypt.Exception <strong>" );
				}
			} catch ( Exception $Exception ) {
				PException::Display ( $Exception );
			}
		}
		return ($this->initializationVector);
	}
	/**
	 * function SetEncryptionKey
	 *
	 * This method creates a encryption key according to the maximum
	 * supported key size of the opened mode and stores it in the XML
	 * configuration file.
	 *
	 * @access public
	 * @param
	 *        	plaintext Plaintext password
	 * @return string Encryption key
	 */
	public function SetEncryptionKey($plaintext) {
		$this->OpenModule ();
		$salt = $this->Hash->GetSalt ( $this->hmacAlgorithmBlockSize, $elementList ['randomDevice'] );
		$this->encryptionKey = $this->Hmac->GetHmac ( $plaintext . $salt );
		$this->XmlConfigDao->SetElementByPath ( '//crypt/encryptionKey', $this->encryptionKey, CONFIG_FILE );
		$this->CloseModule ();
		return ($this->encryptionKey);
	}
	/**
	 * function Encrypt
	 *
	 * This method initializes all buffers needed for encryption,
	 * encrypts data and deinitializes an encryption module.
	 *
	 * @access public
	 * @param
	 *        	plaintext Plaintext
	 * @return string Hexadecimal encoded ciphertext
	 */
	public function Encrypt($plaintext) {
		$this->OpenModule ();
		$encryptionKey = substr ( base64_decode ( $this->encryptionKey ), 0, $this->GetKeySize () );
		try {
			$returnValue = @mcrypt_generic_init ( $this->encryptionDescriptor, $encryptionKey, $this->SetRandomIv () );
			if ($returnValue < 0 && - 3 !== $returnValue && - 4 !== $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): An unknown error occurred : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else if (- 3 == $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): The key length was incorrect : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else if (- 4 == $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): There was a memory allocation problem : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else {
				$ciphertext = @mcrypt_generic ( $this->encryptionDescriptor, $plaintext );
				@mcrypt_generic_deinit ( $this->encryptionDescriptor );
				$this->CloseModule ();
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
		return (bin2hex ( $ciphertext ));
	}
	/**
	 * function Decrypt
	 *
	 * This method initializes all buffers needed for decryption,
	 * decrypts data and deinitializes a decryption module.
	 *
	 * @access public
	 * @param
	 *        	ciphertext Ciphertext
	 * @return string Stripped plaintext
	 */
	public function Decrypt($ciphertext) {
		$this->OpenModule ();
		$encryptionKey = substr ( base64_decode ( $this->encryptionKey ), 0, $this->GetKeySize () );
		try {
			$returnValue = @mcrypt_generic_init ( $this->encryptionDescriptor, $encryptionKey, $this->GetRandomIv () );
			if ($returnValue < 0 && - 3 !== $returnValue && - 4 !== $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): An unknown error occurred : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else if (- 3 == $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): The key length was incorrect : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else if (- 4 == $returnValue) {
				throw new Exception ( "<h1>\n  Initialization Failed\n</h1>\n<strong>Fatal:</strong> mcrypt_generic_init(): There was a memory allocation problem : phpwebtk.cryptography.Crypt.Exception <strong>" );
			} else {
				$plaintext = @mdecrypt_generic ( $this->encryptionDescriptor, substr ( $this->Convert->Hex2Bin ( $ciphertext ), 0, $this->GetIvSize () ) );
				@mcrypt_generic_deinit ( $this->encryptionDescriptor );
				$this->CloseModule ();
			}
		} catch ( Exception $Exception ) {
			PException::Display ( $Exception );
		}
		return (trim ( $plaintext ));
	}
	/**
	 * function CloseModule
	 *
	 * This method closes the mcrypt module.
	 *
	 * @access public
	 */
	private function CloseModule() {
		@mcrypt_module_close ( $this->encryptionDescriptor );
	}
}
?>
