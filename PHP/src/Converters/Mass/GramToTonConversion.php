<?php
namespace OGBitBlt\IntlSysUnit\Mass\Conversion;

use OGBitBlt\IntlSysUnit\AbstractConverter;
use OGBitBlt\IntlSysUnit\IIntlSysUnitConverterInterface;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\Ton;

/**
 * Implements the conversion calculation between a kilo gram and a metric ton
 */
class GramToTonConversion extends AbstractConverter implements IIntlSysUnitConverterInterface
{
    const multiplier = 907185;
    public function __construct() { parent::__construct(self::multiplier); }
    public function From(IIntlSysUnitInterface $tons): Gram { return new Gram(parent::FloatFrom($tons->Value())); }
    public function To(IIntlSysUnitInterface $grams): Ton { return new Ton( parent::FloatTo($grams->Value())); }
}
?>