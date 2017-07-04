<?php
/**
 * Created: 2017-06-27 23:15
 */

namespace Vgait\Toolbox;

class Validation
{

    public static function isString($value, array $options = []): bool
    {
        if ( is_string($value) ) {
            return self::validateOptions($value, $options);
        }
        return FALSE;
    }

    public static function isInteger($var, array $options = []): bool
    {
        if ( is_int($var) ) {
            return self::validateOptions($var, $options);
        }
        return FALSE;
    }

    public static function isArray($var, array $options = []): bool
    {
        if ( is_array($var) ) {
            return self::validateOptions($var, $options);
        }
        return FALSE;
    }

    private static function validateOptions($value, array $options): bool
    {
        $validation = FALSE;

        if ( empty($options) ) {
            return TRUE;
        }

        foreach ( $options as $option => $setting ) {
            switch ( $option ) {
                case 'max' :
                    $validation = self::max($value, $setting);
                    break;
                case 'min' :
                    $validation = self::min($value, $setting);
                    break;
                case 'length' :
                    $validation = self::length($value, $setting);
                    break;
                case 'equals':
                    $validation = self::equals($value, $setting);
                    break;
                case 'contains':
                    $validation = self::contains($value, $setting);
                    break;
                default:
                    return $validation;
            }
        }
        return $validation;
    }

    public static function max($var, int $max): bool
    {
        $result = FALSE;
        if ( is_string($var) ) {
            $result = strlen($var) <= $max;
        }
        else if ( is_numeric($var) ) {
            $result = $var <= $max;
        }
        else {
            $result = count($var) <= $max;
        }

        return $result;
    }

    public static function min($var, int $min): bool
    {
        $result = FALSE;
        if ( is_string($var) ) {
            $result = strlen($var) >= $min;
        }
        else if ( is_numeric($var) ) {
            $result = $var >= $min;
        }
        else {
            $result = count($var) >= $min;
        }

        return $result;
    }

    public static function equals($var, int $equals): bool
    {
        $result = FALSE;
        if ( is_string($var) ) {
            $result = strlen($var) == $equals;
        }
        else if ( is_numeric($var) ) {
            $result = $var == $equals;
        }
        else {
            $result = count($var) == $equals;
        }

        return $result;
    }

    public static function contains($var, $expected): bool
    {
        $result = FALSE;
        if ( is_string($var) ) {
            //todo Detect in string
        }
        else if ( is_array($var) ) {
            $result = in_array($expected, $var);
        }
        return $result;
    }

    public static function length($var, int $length): bool
    {
        $result = FALSE;
        if ( is_string($var) ) {
            $result = strlen($var) == $length;
        }
        else if ( is_numeric($var) ) {
            $result = strlen($var) == $length;
        }
        else {
            $result = count($var) == $length;
        }

        return $result;

    }

}