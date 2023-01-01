<?php
namespace OGBitBlt\IntlSysUnit\Traits;

trait TemperatureTraits 
{
    public function To(string $fromClass)
    {   
    }

    public function ToSIBase() 
    {
        return $this->ToKelvin();
    }

    public function ToFahrenheight()
    {
        return ToFahrenheight::execute($this);
    }

    public function ToCelsius()
    {
        return ToCelsius::execute($this);
    }

    public function ToKelvin()
    {
        return ToKelvin::execute($this);
    }
}

?>