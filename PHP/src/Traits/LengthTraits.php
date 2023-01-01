<?php
/*
 * Copyright (c) 2022 Anthony Davis <ogbitblt@pm.me>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to 
 * deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or 
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */
namespace OGBitBlt\IntlSysUnit\Traits;

use OGBitBlt\IntlSysUnit\Converters\Length\ToCentimeter;
use OGBitBlt\IntlSysUnit\Converters\Length\ToFathom;
use OGBitBlt\IntlSysUnit\Converters\Length\ToInch;
use OGBitBlt\IntlSysUnit\Converters\Length\ToMeter;
use OGBitBlt\IntlSysUnit\Converters\Length\ToMillimeter;
use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Centimeter;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Fathom;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Inch;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Metre;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Millimeter;

trait LengthTraits
{
    public function To(string $classType) : SIUnitInterface 
    {
        switch($classType)
        {
            case Centimeter::class :    return $this->ToCentimeter();
            case Meter::class :         return $this->ToMeter();
            case Millimeter::class :    return $this->ToMillimeter();
            case Inch::class :          return $this->ToInch();
            case Fathom::class :        return $this->ToFathom();

        }
    }

    public function ToSIBase() : Metre
    {
        return $this->ToMeter();
    }

    public function ToCentimeter() : Centimeter
    {
        return ToCentimeter::execute($this);
    }

    public function ToMeter() : Metre
    {
        return ToMeter::execute($this);
    }

    public function ToMillimeter() : Millimeter
    {
        return ToMillimeter::execute($this);
    }

    public function ToInch() : Inch
    {
        return ToInch::execute($this);
    }

    public function ToFathom() : Fathom
    {
        return ToFathom::execute($this);
    }
}
?>