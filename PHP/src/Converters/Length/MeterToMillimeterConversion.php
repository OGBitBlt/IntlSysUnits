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

use OGBitBlt\IntlSysUnit\Abstract\AbstractConverter;
use OGBitBlt\IntlSysUnit\Interface\SIUnitConverterInterface;
use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Metre;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Millimeter;

/**
 * Implements the conversion calculation between meters and millimeters and vice versa
 */
class MeterToMillimeterConversion 
        extends AbstractConverter 
        implements SIUnitConverterInterface
{
    const multiplier = 1000;
    
    public function __construct() 
    {
        parent::__construct(self::multiplier); 
    }

    public function From(SIUnitInterface $mm): Metre 
    {
        return new Metre(parent::FloatTo($mm->Value()));
    }
    
    public function To(SIUnitInterface $meters): Millimeter 
    { 
        return new Millimeter(parent::FloatFrom($meters->Value())); 
    }
}
?>