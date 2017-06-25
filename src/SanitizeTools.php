<?php
namespace Libs\Tools;

/**
 * Created by PhpStorm.
 * User: hh
 * Date: 2016-09-07
 * Time: 16:27
 */
class SanitizeTools {

	/**
	 * @param      $number
	 *
	 * @return int
	 */
	static function filterInt ( $number ) {

		$sanitized = filter_var( $number, FILTER_SANITIZE_NUMBER_INT );
		$filtered  = filter_var( $sanitized, FILTER_VALIDATE_INT );

		return $filtered;
	}

	/**
	 * @param mixed $date
	 *
	 * @return bool|string the verified and formatted date as string, or false.
	 */
	static function filterDate ( $date ) {

		$dateLength = strlen( $date );
		if ( $dateLength < 8 && $dateLength >= 6 ) {
			$date = '20' . $date;
		}

		$strtotime = strtotime( $date );

		if ( ! $strtotime ) {
			return FALSE;
		} else {
			return date( 'Y-m-d', $strtotime );
		}
	}

	/**
	 * Verify text
	 *
	 * Sanitize, trim and validate string.
	 *
	 * @param mixed $string $string to verify.
	 *
	 * @return string The verified and filtered + trimmed string.
	 */
	static function filterString ( $string ): string {

		$sanitized = trim( filter_var( $string, FILTER_SANITIZE_SPECIAL_CHARS ) );

		return $sanitized;

	}

	/**
	 * Sanitize and validate string as email
	 *
	 * @param mixed $email
	 *
	 * @return bool|string
	 */
	static function filterEmail ( $email ) {

		$sanitized = filter_var( $email, FILTER_SANITIZE_EMAIL );

		return filter_var( $sanitized, FILTER_VALIDATE_EMAIL );

	}
}
