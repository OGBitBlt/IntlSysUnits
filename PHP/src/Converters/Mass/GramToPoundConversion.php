<?php
namespace OGBitBlt\IntlSysUnit\Mass\Conversion;

use OGBitBlt\IntlSysUnit\AbstractConverter;
use OGBitBlt\IntlSysUnit\IIntlSysUnitConverterInterface;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\Pound;

/**
 * Converts Pounds to Grams and vice versa
 */
class GramToPoundConversion extends AbstractConverter implements IIntlSysUnitConverterInterface
{
    const multiplier = 453.592;
    public function __construct() { parent::__construct(self::multiplier); }
    public function From(IIntlSysUnitInterface $pounds): Gram { return new Gram(parent::FloatFrom($pounds->Value())); }
    public function To(IIntlSysUnitInterface $grams): Pound { return new Pound(parent::FloatTo($grams->Value())); }
}
?>