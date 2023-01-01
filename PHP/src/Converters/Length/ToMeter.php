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
namespace OGBitBlt\IntlSysUnit\Converters\Length;

use OGBitBlt\IntlSysUnit\Exception\IncompatibleTypeConversionException;
use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Centimeter;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Inch;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Metre;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Millimeter;

/**
 * Implements the ToMeter() method that is included in each Length SIUnit
 */
class ToMeter
{
    public static function execute(SIUnitInterface $from) : Metre
    {
        switch($from::class)
        {
            case Metre::class:      return $from;
            case Centimeter::class: return (new MeterToCentimeterConversion())->From($from);
            case Millimeter::class: return (new MeterToMillimeterConversion())->From($from);
            case Inch::class:       return (new MeterToInchConversion())->From($from);
            case Fathom::class:     return (new MeterToFathomConversion())->From($from);
            default:                throw new IncompatibleTypeConversionException($from, new Metre());
        }
    }
}
?>