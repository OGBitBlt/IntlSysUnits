<?php
namespace OGBitBlt\IntlSysUnit\Mass\Traits;

use OGBitBlt\IntlSysUnit\IIntlSysUnitInterface;
use OGBitBlt\IntlSysUnit\Mass\Gram;
use OGBitBlt\IntlSysUnit\Mass\KiloGram;
use OGBitBlt\IntlSysUnit\Mass\MetricTon;
use OGBitBlt\IntlSysUnit\Mass\Pound;
use OGBitBlt\IntlSysUnit\Mass\Ton;

trait MassTraits 
{
    public function To($classType) : IIntlSysUnitInterface
    {
        switch($classType)
        {
            case Gram::class:       return $this->ToGram();
            case KiloGram::class:   return $this->ToKiloGram();
            case MetricTon::class:  return $this->ToMetricTon();
            case Pound::class:      return $this->ToPound();
            case Ton::class:        return $this->ToTon();
        }
    }

    public function ToSIBase() : Gram
    {
        return $this->ToGram();
    }

    public function ToPound() : Pound 
    {
        return ToPound::execute($this);
    }

    public function ToKiloGram() : KiloGram
    {
        return ToKiloGram::execute($this);
    }

    public function ToGram() : Gram
    {
        return ToGram::execute($this);
    }

    public function ToTon() : Ton
    {
        return ToTon::execute($this);
    }

    public function ToMetricTon() : MetricTon
    {
        return ToMetricTon::execute($this);
    }
}

?>