<?php 
namespace OGBitBlt\IntlSysUnit\Temperature\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Temperature\Fahrenheight;

/**
 * Converts the parent object into a Fahrenheight Unit of measure object
 */
class ToFahrenheight
{
    public static function execute(IIntlSysUnitInterface $from) : Fahrenheight
    {
        return new Fahrenheight();
    }
}
?>