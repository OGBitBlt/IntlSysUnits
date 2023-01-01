<?php
namespace OGBitBlt\IntlSysUnit\Mass\Conversion;

use OGBitBlt\IntlSysUnit\AbstractConverter;
use OGBitBlt\IntlSysUnit\IIntlSysUnitConverterInterface;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\MetricTon;

/**
 * Implements the conversion calculation between a kilo gram and a metric ton
 */
class GramToMetricTonConversion extends AbstractConverter implements IIntlSysUnitConverterInterface
{
    const multiplier = 1000000;
    public function __construct() { parent::__construct(self::multiplier); }
    public function From(IIntlSysUnitInterface $metricTons): Gram { return new Gram(parent::FloatFrom($metricTons->Value())); }
    public function To(IIntlSysUnitInterface $grams): MetricTon { return new MetricTon( parent::FloatTo($grams->Value())); }
}
?>