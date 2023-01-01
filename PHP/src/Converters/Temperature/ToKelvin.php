<?php 
namespace OGBitBlt\IntlSysUnit\Temperature\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Temperature\Kelvin;

/**
 * Converts the parent object into a Kelvin Unit of measure object
 */
class ToKelvin 
{
    public static function execute(IIntlSysUnitInterface $from) : Kelvin
    {
        return new Kelvin();
    }
}
?>