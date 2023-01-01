<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToPoundConversion;
use OGBitBlt\IntlSysUnit\Mass\Pound;

/**
 * Implements the ToPound() method for each Mass Unit of Measure object
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class ToPound
{
    public static function execute(IIntlSysUnitInterface $from) : Pound
    {
        if($from::class == Pound::class) return $from;
        else if($from::class == Gram::class) return (new GramToPoundConversion())->To($from);
        else return (new GramToPoundConversion())->To($from->ToGram());
    }
}
?>