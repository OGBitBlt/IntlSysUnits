<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Conversion\GramToMetricTonConversion;
use OGBitBlt\IntlSysUnit\Mass\MetricTon;

/**
 * Implements the ToMetricTon() method for each Mass Unit of Measure object
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class ToMetricTon
{
    public static function execute(IIntlSysUnitInterface $from) : MetricTon
    {
        if($from::class == MetricTon::class) return $from;
        else if($from::class == Gram::class) return (new GramToMetricTonConversion())->To($from);
        else return (new GramToMetricTonConversion())->To($from->ToGram());
    }
}
?>