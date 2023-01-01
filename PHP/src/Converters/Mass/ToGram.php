<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\Convert\Exception\IncompatibleTypeConversionException;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToKiloConversion;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToMetricTonConversion;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToPoundConversion;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToTonConversion;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\KiloGram;
use OGBitBlt\IntlSysUnit\Mass\MetricTon;
use OGBitBlt\IntlSysUnit\Mass\Pound;
use OGBitBlt\IntlSysUnit\Mass\Ton;

/**
 * Implements the ToPound() method for each Mass Unit of Measure object
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class ToGram
{
    public static function execute(IIntlSysUnitInterface $from) : Gram
    {
        switch($from::class)
        {
            case Gram::class:       return $from;
            case KiloGram::class:   return (new GramToKiloConversion())->From($from);
            case MetricTon::class:  return (new GramToMetricTonConversion())->From($from);
            case Pound::class:      return (new GramToPoundConversion())->From($from);
            case Ton::class:        return (new GramToTonConversion())->From($from);
            default:                throw new IncompatibleTypeConversionException($from, new Gram());
        }
    }
}
?>
