<?php
/**
 * Created: 2016-12-11 15:05
 */

namespace Vgait\Toolbox;

class Randomize {

    /**
     * Generates a random string with length given.
     *
     * Length is not exact!
     *
     * @param int $length
     *
     * @return string
     */
    public static function RandomString (int $length ): string {

		return base64_encode( random_bytes( $length ) );

	}

}