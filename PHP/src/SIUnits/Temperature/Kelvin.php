<?php
namespace OGBitBlt\IntlSysUnit\Temperature;

use OGBitBlt\IntlSysUnit\AbstractIntlSysUnit;
use OGBitBlt\IntlSysUnit\Enumeration\IntlSysUnitType;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Temperature\Traits\TemperatureTraits;

/**
 * SI Unit of Temperature Kelvin (the base SI Unit type) 
 */
class Kelvin extends AbstractIntlSysUnit implements IIntlSysUnitInterface
{
    use TemperatureTraits;

    public function __construct(float $v = null)
    {
        $this->Value($v);
        $this->_type = IntlSysUnitType::Temperature;
        
    }
}

?>