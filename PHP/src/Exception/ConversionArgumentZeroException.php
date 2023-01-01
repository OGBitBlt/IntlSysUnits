<?php
namespace OGBitBlt\IntlSysUnit\Exception;

use Exception;
use Throwable;

/**
 * Thrown when attempting to convert from an object with a value of Zero.
 * 
 * This exception occurs in a converter object and is thrown by a converter.
 * The error occurs when you attempt to convert from one SIUnit into another, 
 * and the value of the SIUnit you are converting from is zero. Because 
 * converter objects using division to convert from an object to another, this
 * exception is the equivilent of a divide by zero exception.
 */
class ConversionArgumentZeroException extends Exception 
{
    public function __construct(string $message, ?int $code = 0, ?Throwable $prev = null)
    {
        parent::__construct($message,$code,$prev);
    }
}
?>