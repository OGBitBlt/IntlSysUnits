<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToKiloConversion;
use OGBitBlt\IntlSysUnit\Mass\KiloGram;

/**
 * Implements the ToKiloGram() method for each Mass Unit of Measure object
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class ToKiloGram
{
    public static function execute(IIntlSysUnitInterface $from) : KiloGram
    {
        if($from::class == KiloGram::class) return $from;
        else if($from::class == Gram::class) return (new GramToKiloConversion())->To($from);
        else return (new GramToKiloConversion())->To($from->ToGram());
    }
}
?>