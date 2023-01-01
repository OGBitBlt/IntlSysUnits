<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToTonConversion;
use OGBitBlt\IntlSysUnit\Mass\Ton;

/**
 * Implements the ToTon() method for each Mass Unit of Measure object
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class ToTon
{
    public static function execute(IIntlSysUnitInterface $from) : Ton
    {
        if($from::class == Ton::class) return $from;
        else if($from::class == Gram::class) return (new GramToTonConversion())->To($from);
        else return (new GramToTonConversion())->To($from->ToGram());
    }
}
?>