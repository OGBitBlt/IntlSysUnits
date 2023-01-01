<?php
namespace OGBitBlt\IntlSysUnit\Mass\Conversion;

use OGBitBlt\IntlSysUnit\AbstractConverter;
use OGBitBlt\IntlSysUnit\IIntlSysUnitConverterInterface;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\KiloGram;

/**
 * Implements the conversion calculation between inches and meters and vice versa
 */
class GramToKiloConversion extends AbstractConverter implements IIntlSysUnitConverterInterface
{
    const multiplier = 1000;
    public function __construct() { parent::__construct(self::multiplier); }
    public function From(IIntlSysUnitInterface $kilos): Gram { return new Gram(parent::FloatFrom($kilos->Value())); }
    public function To(IIntlSysUnitInterface $grams): KiloGram { return new KiloGram( parent::FloatTo($grams->Value())); }
}
?>