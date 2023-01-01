<?php
namespace OGBitBlt\IntlSysUnit\Mass;

use OGBitBlt\IntlSysUnit\AbstractIntlSysUnit;
use OGBitBlt\IntlSysUnit\Enumeration\IntlSysUnitType;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Traits\MassTraits;

/**
 * Represents the Metric Ton or Tonne unit of measure for mass defined by the 
 * international system of units "SI" (Systeme International d'Unites)
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class MetricTon extends AbstractIntlSysUnit implements IIntlSysUnitInterface 
{
    use MassTraits;

    public function __construct(float $v = null) 
    { 
        $this->Value($v);
        $this->_type = IntlSysUnitType::Mass; 
    }
}

?>