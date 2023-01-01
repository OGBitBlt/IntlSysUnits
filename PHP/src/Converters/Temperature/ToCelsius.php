<?php 
namespace OGBitBlt\IntlSysUnit\Temperature\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Temperature\Celsius;

/**
 * Converts the parent object into a Fahrenheight Unit of measure object
 */
class ToCelsius
{
    public static function execute(IIntlSysUnitInterface $from) : Celsius
    {
        return new Celsius();
    }
}
?>