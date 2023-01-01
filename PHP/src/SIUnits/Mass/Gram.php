<?php
namespace OGBitBlt\IntlSysUnit\Mass;

use OGBitBlt\IntlSysUnit\AbstractIntlSysUnit;
use OGBitBlt\IntlSysUnit\Enumeration\IntlSysUnitType;
use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Traits\MassTraits;

/**
 * The Gram is the SI unit for Mass. When calculating, everything should be converted to grams.
 * @package: ogbitblt/IntlSysUnit 
 * @author: Anthony Davis <ogbitblt@pm.me>
 */
class Gram extends AbstractIntlSysUnit implements IIntlSysUnitInterface 
{
    use MassTraits;

    public function __construct(float $v = null) 
    { 
        $this->Value($v);
        $this->_type = IntlSysUnitType::Mass; 
    }
}

?>