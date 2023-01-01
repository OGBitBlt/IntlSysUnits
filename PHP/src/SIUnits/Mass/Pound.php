<?php
namespace OGBitBlt\IntlSysUnit\Mass;

use OGBitBlt\IntlSysUnit\AbstractIntlSysUnit;
use OGBitBlt\IntlSysUnit\Enumeration\IntlSysUnitType;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Traits\MassTraits;

/**
 * Represents the U.S. Pound (LBS) unit of measurement.
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class Pound extends AbstractIntlSysUnit implements IIntlSysUnitInterface 
{
    use MassTraits;

    public function __construct(float $v = null) 
    { 
        $this->Value($v); 
        $this->_type = IntlSysUnitType::Mass;
    }
}

?>