<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class Prng
 *
 * This class provides a simple interface to two character devices, the
 * rand() function and the mt_rand() function. The /dev/random character
 * device is suitable for use when very high quality randomness is
 * desired. The /dev/urandom character device will result in randomness
 * that is merely cryptographically strong. The main difference between
 * the two is that /dev/random is blocking and /dev/urandom is
 * non-blocking. The rand() function uses the libc random number
 * generator. However, mt_rand() is a drop-in replacement for rand()
 * that uses a random number generator with known characteristics using
 * the Mersenne Twister, that will produce randomnumbers four times
 * faster than what the average libc rand() provides.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage mathematics
 */
class Prng {
	// Private members
	private static $Prng;
	/**
	 * function GetPseudoRandomValue()
	 *
	 * This method retrieves random bits of entropy using a
	 * Pseudo-Random Number Generator (PRNG) device or function. The
	 * format of the random bits is determined by first converting them
	 * to hexadecimal format and then converting them to decimal format
	 * byte by byte for /dev/random and /dev/urandom. Furthermore, since
	 * values are converted from binary to decimal one at a time, the
	 * RAND_MAX (2147483647) constraint does not limit our ability to
	 * generate very long random numbers.
	 *
	 * @access public
	 * @param
	 *        	source Random source of entropy
	 * @param
	 *        	length Length of entropy in bytes
	 * @return mixed Random number|FALSE
	 */
	public function GetPseudoRandomValue($source, $length = 8) {
		switch ($source) {
			case 0 :
				$StreamIo = new StreamIo ( '/dev/random' );
				$rval = '';
				$StreamIo->Open ( 'rb' );
				for($i = 1; $i < $length + 1; $i ++) {
					$rval .= hexdec ( bin2hex ( $StreamIo->ReadLength ( 1 ) ) );
				}
				$StreamIo->Close ();
				return ($rval);
				break;
			case 1 :
				$StreamIo = new StreamIo ( '/dev/urandom' );
				$rval = '';
				$StreamIo->Open ( 'rb' );
				for($i = 1; $i < $length + 1; $i ++) {
					$rval .= hexdec ( bin2hex ( $StreamIo->ReadLength ( 1 ) ) );
				}
				$StreamIo->Close ();
				return ($rval);
				break;
			case 2 :
				return (rand ());
				break;
			case 3 :
				return (mt_rand ());
				break;
		}
		return (FALSE);
	}
}
?>
